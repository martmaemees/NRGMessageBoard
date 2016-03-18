@extends('layouts.frame')

@section('content')

    {!! Form::model($message, ['url' => url('cp/edit', $message->id), 'class' => 'form-horizontal']) !!}

        @include('main.messageForm', ['button' => 'Muuda teade', 'message' => $message])

    {!! Form::close() !!}

@endsection
