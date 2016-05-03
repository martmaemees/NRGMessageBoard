@extends('reveal/frame')

@section('content')
    <div class="reveal" id="revealLogo">
        <div class="slides">
            @foreach($data as $slide)
                <section>
                    <h3>{{ $slide->title }}</h3>
                    <p>{!! $slide->body !!}</p>
                </section>
            @endforeach

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        Reveal.initialize({
            controls: false,
            progress: false,
            slideNumber: false,
            touch: false,
            loop: true,
            autoSlide: 20000,
            viewDistance: 3
        });
    </script>

    <script>
        window.setInterval(function() {
                    var version = jQuery.get('/latestDate');
                    var jsonObj = JSON.parse(version);
                    console.log(jsonObj);
                }, 10000);
    </script>
@endsection