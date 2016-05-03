<div class="page-header">
    <div class="row">
        <div class="col-sm-2">
            <h1><a href="">NRG</a></h1>
        </div>
        <div class="col-sm-7">
            <a href="/" class="btn btn-default btn-header" >Avaleht</a>
            <a href="/reveal" class="btn btn-default btn-header" >Presentatsioon</a>
            @if(Auth::check())
                <a href="/cp" class="btn btn-default btn-header">Juhtpaneel</a>
                <a href="/create" class="btn btn-default btn-header">Uus teade</a>
            @endif
        </div>
        <div class="col-sm-3 text-right">
            @if(Auth::check())
                <a href="/logout" class="btn btn-info btn-header">Logi välja</a>
            @else
                <a href="/login" class="btn btn-info btn-header">Logi sisse</a>
                <a href="/register" class="btn btn-info btn-header">Registreeri</a>
            @endif
        </div>
    </div>
</div>