@extends('layouts.principal')

@section('content')
        <h1 class="pull-left">Grupos</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.datos.puc.grupos.create') !!}">Agregar nuevo</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('cuentaGrupos.table')
		{!! $cuentaGrupos->render() !!}
        
@endsection