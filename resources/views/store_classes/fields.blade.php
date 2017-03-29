<!-- 分类名称 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', '分类名称:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- 分类描述 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('desc', '分类描述:') !!}
    {!! Form::text('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- 排序 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weigh', '排序:') !!}
    {!! Form::number('weigh', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('storeClasses.index') !!}" class="btn btn-default">Cancel</a>
</div>
