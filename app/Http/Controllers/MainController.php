<?php

namespace App\Http\Controllers;

use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\MessageRequest;
use App\Http\Controllers\Controller;
class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'controlPanel', 'delete', 'edit', 'update', 'store']]);
    }

    # Function to show the front page.
    public function index()
    {
        $APPID = '08fb14b0fe89472ff2c1a246bd2eb854';    # ID of user on openweathermap.org
        $CITYID = '589933';                             # CityID of Nõo for openweathermap.org

        $client = new \GuzzleHttp\Client([
            'base_uri' => 'http://api.openweathermap.org/'
        ]);
        # Request to get the current weather data for the location defined in $CITYID
        $response = $client->get('http://api.openweathermap.org/data/2.5/weather',
            [
                'query' => [
                    'id' => $CITYID,
                    'APPID' => $APPID
                ]
            ]
            )->getBody();
        $data = json_decode($response->getContents());

        # Set the weatherIcon url for the CSS of current weather.
        $weatherIcon = 'http://openweathermap.org/img/w/'.$data->weather[0]->icon.'.png';
        # Converts the temperature to celsius.
        $tempCelsius = round($data->main->temp - 273.15, 1);
        $windSpeed = round($data->wind->speed, 2);

        # Gets the active messages and paginates them to 10 per page.
        $messages = Message::active()->paginate(10);
        $title = 'Nõo Reaalgümnaasiumi teadetetahvel';

        return view('main.index', compact('messages', 'title', 'weatherIcon', 'tempCelsius', 'windSpeed'));
    }

    # Shows the message with the id from url.
    public function view(Message $message)
    {
        return view('main.view', compact('message', 'title'));
    }

    # Control panel page that shows all the messages the user has made.
    public function controlPanel()
    {
        $title = 'Control Panel';

        # Gets all the messages of the authenticated user from the database.
        $messages = Auth::user()->messages()->get();

        return view('main.controlPanel', compact('messages', 'title'));
    }

    # Function that deletes the message with the given id, if it was made by the authorized user.
    public function delete($id)
    {
        # Gets all the messages of the authenticated user.
        $collection = Auth::user()->messages();

        # Filters out the message with the given id and then deletes it.
        $filtered = $collection->where('id', $id);
        $filtered->get()[0]->delete();

        return redirect('/cp');
    }

    # Function to show the message editing form.
    public function edit(Message $message)
    {
        $title = 'Muuda teadet';

        return view('main.edit', compact('message', 'title'));
    }

    # Function that updates the edited message in the database.
    public function update(Message $message, MessageRequest $request)
    {
        $message->update($request->all());

        return redirect('/cp');
    }

    # Function that shows the form to create a new message.
    public function create()
    {
        $title = 'Loo uus teade';

        # Creates a new message object.
        $message = new \App\Message;

        # Initializes the startdate and enddate of the message to the current date and date of tomorrow.
        $message->startdate = Carbon::today();
        $message->enddate = Carbon::tomorrow();

        return view('main.create', compact('message', 'title'));
    }

    # Saves a new message into the database.
    public function store(MessageRequest $request)
    {
        Auth::user()->messages()->save(new Message($request->all()));

        return redirect('/');

    }
}