@extends('layouts.admin')

@section('content')
        <h1 class="pull-left">Clases</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clases.create') !!}">Agregar Nueva</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('cuentaClases.table')
		{!! $cuentaClases->render() !!}
        
@endsection