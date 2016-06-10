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

<!-- Cntg Cntcid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntg_cntcid', 'Clase id:') !!}
	{!! Form::select('cntg_cntcid', $cuentaClase, null, ['class' => 'form-control', 'size' => '4', 'placeholder' => 'Seleccione una clase' ])!!}
</div>

<!-- Cntg Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntg_id', 'Id:') !!}
    {!! Form::text('cntg_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cuentaGrupos.index') !!}" class="btn btn-default">Cancel</a>
</div>
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
