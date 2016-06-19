@extends('layouts.principal')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<h1 class="pull-left">Editar cuenta</h1>
		</div>
	</div>
	@include('flash::message')
	@include('core-templates::common.errors')

	<div class="row">
		{!! Form::model($pucCuenta, ['route' => ['admin.puc.cuentas.update', $pucCuenta->id], 'method' => 'patch']) !!}

		@include('admin.puc.pucCuentas.fields')

		{!! Form::close() !!}
	</div>
@endsection
