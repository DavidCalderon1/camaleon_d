@extends('layouts.principal')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Crear nuevo grupo</h1>
        </div>
    </div>
	
    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'admin.datos.puc.grupos.store']) !!}

            @include('cuentaGrupos.fields')

        {!! Form::close() !!}
    </div>
@endsection