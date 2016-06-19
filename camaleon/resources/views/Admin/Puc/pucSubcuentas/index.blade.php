@extends('layouts.principal')

@section('content')
        @include('flash::message')
        <h1 class="pull-left">Subcuentas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.puc.subcuentas.create') !!}">Agregar nueva</a>

        <div class="clearfix"></div>

        <div class="clearfix"></div>

        @include('admin.puc.pucSubcuentas.table')
		{!! $pucSubcuentas->render() !!}
        
@endsection