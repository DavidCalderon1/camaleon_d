@extends('layouts.principal')

@section('content')
        @include('flash::message')
        <h1 class="pull-left">Grupos</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.puc.grupos.create') !!}">Agregar nuevo</a>

        <div class="clearfix"></div>

        <div class="clearfix"></div>

        @include('admin.puc.pucGrupos.table')
		{!! $pucGrupos->render() !!}
        
@endsection
