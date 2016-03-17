@extends('layouts.frame')

@section('content')

    <h2>{{ $message->title }}</h2>
    <p>{{ $message->body }}</p>

@endsection