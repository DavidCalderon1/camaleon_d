@extends('layouts.principal')

@section('content')
        @include('flash::message')
		<h1 class="pull-left">Cuentas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.puc.cuentas.create') !!}">Agregar nueva</a>

        <div class="clearfix"></div>

        <div class="clearfix"></div>

        @include('admin.puc.pucCuentas.table')
		{!! $pucCuentas->render() !!}
        
@endsection
