@extends('reveal/frame')

@section('content')
    <div class="reveal" id="revealLogo">
        <div class="slides">
            @if($data)
                @foreach($data as $slide)
                    <section>
                        <h3>{{ $slide->title }}</h3>
                        <p>{!! $slide->body !!}</p>
                    </section>
                @endforeach
            @else
                <section>
                    <h2>Tere tulemast</h2>
                    <h2>Nõo Reaalgümnaasiumi!</h2>
                </section>
            @endif
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
            viewDistance: 3,
            autoSlideStoppable: false
        });
    </script>

    <script>
        $(document).ready(function() {

            var url = 'latestDate';
            var xhttp = new XMLHttpRequest();

            // Function to get JSON data from URL and send it into a function passed in as a parameter.
            function loadDoc(cFunc) {
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var responseArray = JSON.parse(xhttp.responseText);
                        response = [responseArray.date, responseArray.activeCount];
                        if(response[0] == null) {
                            cFunc([{date: 'x'}, response[1]]);
                        }else {
                            cFunc(response)
                        }
                    }
                }

                xhttp.open('GET', url, true);
                xhttp.send();
            }

            // Compares requested date with the one set on loading the page.
            function compareState(response)
            {
                if(oldState[0].date != response[0].date || oldState[1] != response[1]) {
                    location.reload(true);
                }
            }

            // Sets the date on loading the page.
            function setDate(response)
            {
                oldState = response;
            }

            loadDoc(setDate);
            // Timeout, to give time for first date to be set, to prevent comparing to undefined oldState.
            setTimeout(function() {
                window.setInterval(function() {
                    loadDoc(compareState)
                }, 5000);
            }, 5000);
        });

    </script>
@endsection