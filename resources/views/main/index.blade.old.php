@extends('layouts.frame')

@section('content')

<ul>
    @foreach($messages as $message)
        <div class="row">
            <div class="col-sm-8">
                <li class="media">
                    @if($message->imgUrl != '')
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object indexThumbnail" src="{{ $message->imgUrl }}" alt="">
                            </a>
                        </div>
                    @endif
                    <div class="media-body">
                        <h4 class="media-heading">{{ $message['title'] }}</h4>
                        <p class="">{{ $message['body'] }}</p>
                    </div>
                </li>
            </div>
        </div>
    @endforeach
</ul>

{!! $messages->links() !!}

@endsection
