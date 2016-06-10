<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ajuste Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ajuste', 'Ajuste:') !!}
    {!! Form::text('ajuste', null, ['class' => 'form-control']) !!}
</div>

<!-- Cnt Cntgid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnt_cntgid', 'Cnt Cntgid:') !!}
    {!! Form::text('cnt_cntgid', null, ['class' => 'form-control']) !!}
</div>

<!-- Cnt Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnt_id', 'Cnt Id:') !!}
    {!! Form::text('cnt_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cuentas.index') !!}" class="btn btn-default">Cancel</a>
</div>
