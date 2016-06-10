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

<!-- Cntc Naturaleza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntc_naturaleza', 'Naturaleza:') !!}
    {!! Form::text('cntc_naturaleza', null, ['class' => 'form-control']) !!}
</div>

<!-- Cntc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntc_id', 'Id:') !!}
    {!! Form::text('cntc_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clases.index') !!}" class="btn btn-default">Cancelar</a>
</div>
