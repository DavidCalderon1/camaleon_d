@extends('layouts.principal')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar cuenta auxiliar</h1>
            </div>
        </div>
	@include('flash::message')
        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cuentaAuxiliar, ['route' => ['admin.datos.puc.cuentasAuxiliares.update', $cuentaAuxiliar->cntaux_id], 'method' => 'patch']) !!}

            @include('cuentaAuxiliars.fields')

            {!! Form::close() !!}
        </div>
@endsection