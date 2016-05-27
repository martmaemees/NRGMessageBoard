@extends('layouts.frame')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Sinu teated</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Pealkiri</th>
                        {{--<th>Body</th>--}}
                        <th>Kuupäev</th>
                        <th>{{--Actions--}}</th>
                    </tr>
                    @foreach($messages as $message)
                        <tr>
                            <td><a href="{{ url('view', $message->id) }}">{{ str_limit($message->title, $limit = 60, $end='...') }}</a></td>
                            {{-- Tabelid bodys lõhuvad struktuuri. --}}
                            {{--<td>{!! str_limit($message->body, $limit = 50, $end='...') !!}</td>--}}
                            <td>{{ $message->startdate->toFormattedDateString() }} - {{ $message->enddate->toFormattedDateString() }}</td>
                            <td>
                                <a class="btn btn-default" href="cp/edit/{{ $message->id }}">Muuda</a>
                                <a class="btn btn-default" Onclick="return confirm('Olete kindel, et soovite seda teadet kustutada?');" href="cp/delete/{{ $message->id }}">Kustuta</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection