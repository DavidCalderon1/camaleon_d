<!-- Cuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuenta_id', 'Cuenta:') !!}
    <p>{!! $pucSubcuenta->cuenta_id !!}</p>
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Código:') !!}
    <p>{!! $pucSubcuenta->codigo !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $pucSubcuenta->nombre !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-10 col-lg-10">
    {!! Form::label('descripcion', 'Descripción:') !!}
    <p>{!! $pucSubcuenta->descripcion !!}</p>
</div>

<!-- Ajuste Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ajuste', 'Ajuste:') !!}
    <p>{!! $pucSubcuenta->ajuste !!}</p>
</div>

<!-- Nativa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nativa', 'Nativa:') !!}
    <p>{!! $pucSubcuenta->nativa !!}</p>
</div>