@extends('layouts.admin')

@section('content')
        <h1 class="pull-left">cuenta_auxiliars</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cuentaAuxiliars.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('cuentaAuxiliars.table')
		{!! $cuentaAuxiliars->render() !!}
        
@endsection