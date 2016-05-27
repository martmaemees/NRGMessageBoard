<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RevealController extends Controller
{
    private function getMessages()
    {
        $messages = \App\Message::active()->get()->all();
//        dd($messages);
        return $messages;
    }

    public function index()
    {
        $data = $this->getMessages();
        return view('reveal.index', compact('data'));
    }

    private function menu()
    {
        return;
    }

    public function latestDate()
    {
        $date = \App\Message::orderBy('updated_at', 'desc')->first();

        $activeCount = \App\Message::active()->count();

        $jsonDate = json_encode(['date' => $date['updated_at'], 'activeCount' => $activeCount]);

        return $jsonDate;
    }


}
