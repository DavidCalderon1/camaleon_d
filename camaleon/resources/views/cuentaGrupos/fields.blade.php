<!-- Cntg Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntg_id', 'Id:') !!}
    {!! Form::number('cntg_id', null, ['class' => 'form-control']) !!}
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

<!-- Cntg Cntcid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntg_cntcid', 'Clase id:') !!}
	{!! Form::select('cntg_cntcid', $cuentaClase, null, ['class' => 'form-control select_scroll', 'size' => '1', 'placeholder' => 'Seleccione una clase' ])!!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.datos.puc.grupos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
<!--
<select name="feeling">
  <optgroup label="Happy">
    <option value="0">Joyous</option>
    <option value="1">Glad</option>
    <option value="2">Ecstatic</option>
  </optgroup>
  <optgroup label="Sad">
    <option value="0">Bereaved</option>
    <option value="1">Pensive</option>
    <option value="2">Down</option>
  </optgroup>
</select>
-->