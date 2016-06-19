@extends('layouts.principal')

@section('content')
        @include('flash::message')
        <h1 class="pull-left">Clases</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.puc.clases.create') !!}">Agregar Nueva</a>

        <div class="clearfix"></div>

        <div class="clearfix"></div>

        @include('Admin.Puc.pucClases.table')
		{!! $pucClases->render() !!}
        
@endsection
