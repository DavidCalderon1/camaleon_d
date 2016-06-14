@extends('layouts.principal')

@section('content')
        <h1 class="pull-left">Cuentas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.datos.puc.cuentas.create') !!}">Agregar nueva</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('cuentas.table')
		{!! $cuentas->render() !!}
        
@endsection