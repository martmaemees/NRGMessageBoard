@extends('reveal/frame')

@section('content')
    <div class="reveal">
        <div class="slides">
            <section>Slide 1</section>
            <section>Slide 2</section>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Reveal.initialize();
    </script>
@endsection