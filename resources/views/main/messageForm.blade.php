<div class="form-group">
    {!! Form::label('title', 'Title: ', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'Body: ', array('class' => 'col-sm-2 control-label')) !!}
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

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body-ckeditor', {
        toolbarGroups: [
            { "name": 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { "name": 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { "name": 'links', groups: [ 'links' ] },
            { "name": 'insert', groups: [ 'insert' ] },
            { "name": 'forms', groups: [ 'forms' ] },
            { "name": 'tools', groups: [ 'tools' ] },
            { "name": 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { "name": 'others', groups: [ 'others' ] },
            { "name": 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { "name": 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { "name": 'styles', groups: [ 'styles' ] },
            { "name": 'colors', groups: [ 'colors' ] },
            { "name": 'about', groups: [ 'about' ] }
        ],
        // Remove the redundant buttons from toolbar groups defined above.
        removeButtons: 'Subscript,Superscript,Anchor,HorizontalRule,SpecialChar,Maximize,About,Styles,Format,Blockquote,Indent,Outdent'
    });
</script>