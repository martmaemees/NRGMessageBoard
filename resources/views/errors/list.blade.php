@if ($errors->any())
    <ul class="alert alert-danger error-list">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif