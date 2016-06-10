@extends('layouts.admin')

@section('content')
        <h1 class="pull-left">subcuentas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('subcuentas.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('subcuentas.table')
		{!! $subcuentas->render() !!}
        
@endsection