<!-- Cntaux Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntaux_id', 'Id:') !!}
    {!! Form::number('cntaux_id', null, ['class' => 'form-control']) !!}
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

<!-- Reqta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reqta', 'Req. tercero/activo:') !!}
    {!! Form::select('reqta', array('1' => 'SI','0' => 'NO'), null, ['class' => 'form-control ', 'placeholder' => 'Seleccione si requiere t/a']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', array('1' => 'ACTIVO','0' => 'INACTIVO'), 1, ['class' => 'form-control ', 'placeholder' => 'Seleccione el estado']) !!}
</div>

<!-- Cntaux Scntid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntaux_scntid', 'Subcuenta id:') !!}
    {!! Form::select('cntaux_scntid', $subcuenta, null, ['class' => 'form-control select_scroll', 'size' => '1', 'placeholder' => 'Seleccione una subcuenta']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.datos.puc.cuentasAuxiliares.index') !!}" class="btn btn-default">Cancelar</a>
</div>
