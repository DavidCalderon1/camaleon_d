@extends('layouts.principal')

@section('content')
        <h1 class="pull-left">Clases</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.datos.puc.clases.create') !!}">Agregar Nueva</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('Admin.Datos.Puc.pucClases.table')
		{!! $pucClases->render() !!}
        
@endsection
