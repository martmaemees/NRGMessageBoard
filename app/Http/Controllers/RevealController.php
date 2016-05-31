<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RevealController extends Controller
{
    # Function to get all the active messages.
    private function getMessages()
    {
        $messages = \App\Message::active()->get()->all();

        return $messages;
    }

    # Main function to show the presentation.
    public function index()
    {
        $data = $this->getMessages();

        return view('reveal.index', compact('data'));
    }

//    private function menu()
//    {
//        return;
//    }

    # Function that returns the date of latest message modification in the database and the number of active messages.
    # Used to determine when it is required to refresh the presentation page.
    public function latestDate()
    {
        # Gets the most recent updated_at date in the messages table.
        $date = \App\Message::orderBy('updated_at', 'desc')->first();

        # Gets the count of active messages.
        $activeCount = \App\Message::active()->count();

        # Encodes the date and count into JSON form.
        $jsonDate = json_encode(['date' => $date['updated_at'], 'activeCount' => $activeCount]);

        return $jsonDate;
    }


}
