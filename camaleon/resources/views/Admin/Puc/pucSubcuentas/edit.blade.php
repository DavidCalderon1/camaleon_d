@extends('layouts.principal')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar subcuenta</h1>
            </div>
        </div>
		@include('flash::message')
        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($pucSubcuenta, ['route' => ['admin.puc.subcuentas.update', $pucSubcuenta->id], 'method' => 'patch']) !!}

            @include('admin.puc.pucSubcuentas.fields')

            {!! Form::close() !!}
        </div>
@endsection