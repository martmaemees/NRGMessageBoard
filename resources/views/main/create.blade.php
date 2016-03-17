@extends('layouts.frame')

@section('content')

{!! Form::model($message ,array('action' => 'MainController@store', 'class' => 'form-horizontal')) !!}

    @include('main/messageForm');

{!! Form::close() !!}

@endsection
