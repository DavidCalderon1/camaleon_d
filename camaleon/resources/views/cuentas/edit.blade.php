@extends('layouts.principal')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar cuenta</h1>
            </div>
        </div>
		@include('flash::message')
        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cuenta, ['route' => ['admin.datos.puc.cuentas.update', $cuenta->cnt_id], 'method' => 'patch']) !!}

            @include('cuentas.fields')

            {!! Form::close() !!}
        </div>
@endsection