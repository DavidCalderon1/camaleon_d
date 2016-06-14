@extends('layouts.principal')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar Subcuenta</h1>
            </div>
        </div>
		@include('flash::message')
        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($subcuenta, ['route' => ['admin.datos.puc.subcuentas.update', $subcuenta->scnt_id], 'method' => 'patch']) !!}

            @include('subcuentas.fields')

            {!! Form::close() !!}
        </div>
@endsection