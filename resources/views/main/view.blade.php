@extends('layouts.frame')

@section('content')
    <div class="col-sm-9">
        <h2>{{ $message->title }}</h2>
        <hr>
        {!! $message->body !!}
    </div>

@endsection