@extends('layouts.principal')

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Clase</h1>
        </div>
    </div>
    @include('Admin.Datos.Puc.pucClases.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.datos.puc.clases.index') !!}" class="btn btn-default">Atras</a>
    </div>
@endsection