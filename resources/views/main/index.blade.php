@extends('layouts.frame')

@section('content')



<div class="row">
    <div class="col-sm-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Teated:</h3>
            </div>
            <div class="panel-body">
                @foreach($messages as $message)

                    <a href="{{ url('/', $message->id) }}"><h4 style="margin:5px 0;"><strong>{{ $message->title }}</strong></h4></a>
                    <p style="padding-left:15px;">{{ $message->body }}</p>

                @endforeach

                <div style="padding-bottom: 0px; margin-bottom: 0px;">{!! $messages->links() !!}</div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Ilm hetkel Nõos</h3>
            </div>
            <div class="panel-body">
                <p><img src={{ $weatherIcon }} alt=""> &nbsp;&nbsp; {{ $tempCelsius }} C&deg; &nbsp;&nbsp; {{ $windSpeed }} m/s</p>
            </div>
        </div>
    </div>
</div>

@endsection