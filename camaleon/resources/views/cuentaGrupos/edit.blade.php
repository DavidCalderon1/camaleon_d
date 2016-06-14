@extends('layouts.principal')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar grupo</h1>
            </div>
        </div>
		@include('flash::message')
        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cuentaGrupo, ['route' => ['admin.datos.puc.grupos.update', $cuentaGrupo->cntg_id], 'method' => 'patch']) !!}

            @include('cuentaGrupos.fields')

            {!! Form::close() !!}
        </div>
@endsection