<div class="form-group">
    {{ Form::label ('Название дела') }}
    {{ Form::text ('title',null,['class' => 'form-control' ]) }}
</div>
<div class="form-group">
    {{ Form::label ('Oписание') }}
    {{ Form::textarea ('content',null,['class' => 'form-control' ]) }}
</div>
<div class="form-group">
    {{ Form::submit ('Save',['class' => 'btn btn-primary' ]) }}
</div>
