<div class="page-header">
    <div class="row">
        <div class="col-sm-2">
            <h1><a href="">NRG</a></h1>
        </div>
        <div class="col-sm-8">
            <a href="/" class="btn btn-default btn-header" >Avaleht</a>
            <a href="#" class="btn btn-default btn-header" >Placeholder</a>
            @if(Auth::check())
                <a href="/cp" class="btn btn-default btn-header">Control Panel</a>
                <a href="/create" class="btn btn-default btn-header">Uus teade</a>
            @endif
        </div>
        <div class="col-sm-2 text-right">
            @if(Auth::check())
                <a href="/logout" class="btn btn-info btn-header">Logout</a>
            @else
                <a href="/login" class="btn btn-info btn-header">Login</a>
                <a href="/register" class="btn btn-info btn-header">Register</a>
            @endif
        </div>
    </div>
</div>