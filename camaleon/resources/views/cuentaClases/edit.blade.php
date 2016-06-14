@extends('layouts.principal')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar Clase</h1>
            </div>
        </div>
		@include('flash::message')
        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cuentaClase, ['route' => ['admin.datos.puc.clases.update', $cuentaClase->cntc_id], 'method' => 'patch']) !!}

            @include('cuentaClases.fields')

            {!! Form::close() !!}
        </div>
@endsection