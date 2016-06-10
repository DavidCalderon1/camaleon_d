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

<!-- Reqta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reqta', 'Reqta:') !!}
    {!! Form::text('reqta', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Cntaux Scntid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntaux_scntid', 'Cntaux Scntid:') !!}
    {!! Form::text('cntaux_scntid', null, ['class' => 'form-control']) !!}
</div>

<!-- Cntaux Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntaux_id', 'Cntaux Id:') !!}
    {!! Form::text('cntaux_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cuentaAuxiliars.index') !!}" class="btn btn-default">Cancel</a>
</div>
