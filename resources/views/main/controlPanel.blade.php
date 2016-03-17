@extends('layouts.frame')

@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Sinu teated</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($messages as $message)
                        <tr>
                            <td><a href="{{ url('/', $message->id) }}">{{ $message->title }}</a></td>
                            <td>{{ $message->body }}</td>
                            <td>{{ $message->startdate->toFormattedDateString() }} - {{ $message->enddate->toFormattedDateString() }}</td>
                            <td>
                                <a class="btn btn-default" href="/cp/edit/{{ $message->id }}">Edit</a>
                                <a class="btn btn-default" href="/cp/delete/{{ $message->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection