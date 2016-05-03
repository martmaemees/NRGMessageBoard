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
            viewDistance: 3,
            autoSlideStoppable: false
        });
    </script>

    <script>
        $(document).ready(function() {

            var url = '/latestDate';
            var xhttp = new XMLHttpRequest();

            // Function to get JSON data from URL and send it into a function passed in as a parameter.
            function loadDoc(cFunc) {
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var responseArray = JSON.parse(xhttp.responseText);
                        cFunc(responseArray.date.date);
                    }
                }

                xhttp.open('GET', url, true);
                xhttp.send();
            }

            // Compares requested date with the one set on loading the page.
            function compareDate(response)
            {
                if(oldDate != response) {
//                    console.log('Refreshing!');
                    location.reload(true);
                }else {
//                    console.log('No updates!');
                }
            }

            // Sets the date on loading the page.
            function setDate(response)
            {
                oldDate = response;
            }

            loadDoc(setDate);
            // Timeout, to give time for first date to be set, to prevent comparing to undefined oldDate.
            setTimeout(function() {
//                console.log(oldDate);
                window.setInterval(function() {
                    loadDoc(compareDate)
                }, 10000);
            }, 10000);
        });

    </script>
@endsection