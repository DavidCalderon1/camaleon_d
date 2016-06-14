@extends('layouts.principal')

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Grupo</h1>
        </div>
    </div>
    @include('cuentaGrupos.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.datos.puc.grupos.index') !!}" class="btn btn-default">Atras</a>
    </div>
@endsection
