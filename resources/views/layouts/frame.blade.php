<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <title>@if(isset($title)){{ $title }}@else Document @endif</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/all.css">
    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>
<body>
{{--<div class="row">--}}
    {{--@include('layouts.header')--}}
{{--</div>--}}
    <div class="container">
        @include('layouts.header')

        @yield('content')
    </div>

    @include('layouts.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/all.js"></script>
</body>
</html>