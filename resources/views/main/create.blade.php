@extends('layouts.frame')

@section('content')

{!! Form::model($message ,array('action' => 'MainController@store', 'class' => 'form-horizontal')) !!}

    @include('main/messageForm', ['button' => 'Loo teade', 'message' => $message]);

{!! Form::close() !!}

@if(count($errors) > 0)
    {{--<div class="alert-danger alert" role="alert">--}}
        <ul>
            @foreach($errors as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    {{--</div>--}}
@endif

@endsection
