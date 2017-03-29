<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Store Type Class Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_type_class_id', 'Store Type Class Id:') !!}
    {!! Form::text('store_type_class_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Weigh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weigh', 'Weigh:') !!}
    {!! Form::number('weigh', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_num', 'Total Num:') !!}
    {!! Form::number('total_num', null, ['class' => 'form-control']) !!}
</div>

<!-- Security Deposit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('security_deposit', 'Security Deposit:') !!}
    {!! Form::number('security_deposit', null, ['class' => 'form-control']) !!}
</div>

<!-- System Use Fee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('system_use_fee', 'System Use Fee:') !!}
    {!! Form::number('system_use_fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('storeLevels.index') !!}" class="btn btn-default">Cancel</a>
</div>
