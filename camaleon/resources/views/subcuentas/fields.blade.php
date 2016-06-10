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

<!-- Scnt Nativa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scnt_nativa', 'Scnt Nativa:') !!}
    {!! Form::text('scnt_nativa', null, ['class' => 'form-control']) !!}
</div>

<!-- Scnt Cntid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scnt_cntid', 'Scnt Cntid:') !!}
    {!! Form::text('scnt_cntid', null, ['class' => 'form-control']) !!}
</div>

<!-- Scnt Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scnt_id', 'Scnt Id:') !!}
    {!! Form::text('scnt_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subcuentas.index') !!}" class="btn btn-default">Cancel</a>
</div>
