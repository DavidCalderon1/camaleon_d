@extends('layouts.admin')

@section('content')
        <h1 class="pull-left">cuenta_grupos</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cuentaGrupos.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('cuentaGrupos.table')
		{!! $cuentaGrupos->render() !!}
        
@endsection