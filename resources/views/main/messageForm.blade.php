<div class="form-group">
    {!! Form::label('title', 'Title: ', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'Body; ', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('body', null, array('class' => 'form-control', 'id' => 'body-ckeditor')) !!}
{{--        {!! Editor::view('body', null, array('class' => 'form-control')) !!}--}}
    </div>
</div>

<div class="form-group">
    {!! Form::label('startdate', 'Start date: ', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::date('startdate', $message->startdate, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('enddate', 'End date: ', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::date('enddate', $message->enddate, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($button, array('class'=>'btn btn-default')) !!}
    </div>
</div>

@if(count($errors) > 0)
    <div class="alert-danger alert" role="alert">
        <ul>
            @foreach($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body-ckeditor' );
</script>