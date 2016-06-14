@extends('layouts.principal')

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Cuenta auxiliar</h1>
        </div>
    </div>
    @include('cuentaAuxiliars.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.datos.puc.cuentasAuxiliares.index') !!}" class="btn btn-default">Atras</a>
    </div>
@endsection