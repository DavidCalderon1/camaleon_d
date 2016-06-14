@extends('layouts.principal')

@section('content')
        <h1 class="pull-left">Cuentas auxiliares</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.datos.puc.cuentasAuxiliares.create') !!}">Agregar nueva</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('cuentaAuxiliars.table')
		{!! $cuentaAuxiliars->render() !!}
        
@endsection
