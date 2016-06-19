<!-- Subcuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subcuenta_id', 'Subcuenta:') !!}
    <p>{!! $pucCuentaauxiliar->subcuenta_id !!}</p>
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Código:') !!}
    <p>{!! $pucCuentaauxiliar->codigo !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $pucCuentaauxiliar->nombre !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-10 col-lg-10">
    {!! Form::label('descripcion', 'Descripción:') !!}
    <p>{!! $pucCuentaauxiliar->descripcion !!}</p>
</div>

<!-- Ajuste Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ajuste', 'Ajuste:') !!}
    <p>{!! $pucCuentaauxiliar->ajuste !!}</p>
</div>

<!-- Tercero Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tercero_activo', 'Tercero Activo:') !!}
    <p>{!! $pucCuentaauxiliar->tercero_activo !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $pucCuentaauxiliar->estado !!}</p>
</div>