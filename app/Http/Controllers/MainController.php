<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\MessageRequest;
use App\Http\Controllers\Controller;
//, ['only' => ['create', 'controlPanel', 'delete', 'edit', 'update', 'store']]
class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $APPID = '08fb14b0fe89472ff2c1a246bd2eb854';
        $CITYID = '589933';

        $client = new \GuzzleHttp\Client([
            'base_uri' => 'http://api.openweathermap.org/'
        ]);
        $response = $client->get('http://api.openweathermap.org/data/2.5/weather',
            [
                'query' => [
                    'id' => $CITYID,
                    'APPID' => $APPID
                ]
            ]
            )->getBody();
        $data = json_decode($response->getContents());

//        dd($data->main->temp);

        $weatherIcon = 'http://openweathermap.org/img/w/'.$data->weather[0]->icon.'.png';
        $tempCelsius = round($data->main->temp - 273.15, 1);
        $windSpeed = round($data->wind->speed, 2);
//        dd($data->weather[0]->icon);

        $messages = Message::active()->paginate(10);
        $title = 'Nõo Reaalgümnaasiumi teadetetahvel';
        return view('main.index', compact('messages', 'title', 'weatherIcon', 'tempCelsius', 'windSpeed'));
    }

    public function view(Message $message)
    {
//        dd($message->body);

        return view('main.view', compact('message', 'title'));
    }

    public function controlPanel()
    {
        $title = 'Control Panel';
        $messages = Auth::user()->messages()->get();
        return view('main.controlPanel', compact('messages', 'title'));
    }

    public function delete($id)
    {
        $collection = Auth::user()->messages();
        $filtered = $collection->where('id', $id);
        $filtered->get()[0]->delete();
        return redirect('/cp');
    }

    public function edit(Message $message)
    {
        $title = 'Muuda teadet';
        return view('main.edit', compact('message', 'title'));
    }

    public function update(Message $message, MessageRequest $request)
    {
//        dd($message);
        $message->update($request->all());

        return redirect('/cp');
    }

    public function create()
    {
        $title = 'Loo uus teade';
        $message = new \App\Message;
        $button = 'Loo teade';

        return view('main.create', compact('message', 'title', 'button'));
    }

    public function store(MessageRequest $request)
    {
//        $input = Input::get(Editor::input());
//        dd(Editor::content($input));

        Auth::user()->messages()->save(new Message($request->all()));

        return redirect('/');

    }
}