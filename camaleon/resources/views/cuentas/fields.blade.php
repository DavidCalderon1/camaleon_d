<!-- Cnt Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnt_id', 'Id:') !!}
    {!! Form::number('cnt_id', null, ['class' => 'form-control']) !!}
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

<!-- Cnt Cntgid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnt_cntgid', 'Grupo id:') !!}
	{!! Form::select('cnt_cntgid', $cuentaGrupo, null, ['class' => 'form-control select_scroll', 'size' => '1', 'placeholder' => 'Seleccione un grupo' ])!!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.datos.puc.cuentas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
