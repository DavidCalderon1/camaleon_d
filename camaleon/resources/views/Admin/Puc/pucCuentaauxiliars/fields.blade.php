<!-- Subcuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subcuenta_id', 'Subcuenta:') !!}
	{!! Form::select('subcuenta_id', $pucSubcuenta, null, ['class' => 'form-control select_scroll', 'size' => '1', 'placeholder' => 'Seleccione una subcuenta' ])!!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Código:') !!}
    {!! Form::number('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-10 col-lg-10">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ajuste Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ajuste', 'Ajuste:') !!}
    {!! Form::select('ajuste', array('MENSUAL' => 'MENSUAL','ANUAL' => 'ANUAL'), null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el ajuste']) !!}
</div>

<!-- Tercero Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tercero_activo', 'Requiere Tercero/Activo:') !!}
	{!! Form::select('tercero_activo', array('1' => 'SI','0' => 'NO'), null, ['class' => 'form-control ', 'placeholder' => 'Seleccione si es requerido t/a']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', array('1' => 'ACTIVO','0' => 'INACTIVO'), null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el estado']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.puc.cuentasauxiliares.index') !!}" class="btn btn-default">Cancelar</a>
</div>
