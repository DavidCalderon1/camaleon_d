<!-- Cntc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntc_id', 'Id:') !!}
    {!! Form::number('cntc_id', null, ['class' => 'form-control']) !!}
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

<!-- Cntc Naturaleza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntc_naturaleza', 'Naturaleza:') !!}
	{!! Form::select('cntc_naturaleza', array('DEBITO' => 'DEBITO','CREDITO' => 'CREDITO'), null, ['class' => 'form-control ', 'placeholder' => 'Seleccione la naturaleza']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.datos.puc.clases.index') !!}" class="btn btn-default">Cancelar</a>
</div>
