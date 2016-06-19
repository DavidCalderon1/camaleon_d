@extends('layouts.principal')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<h1 class="pull-left">Editar grupo</h1>
		</div>
	</div>
	@include('flash::message')
	@include('core-templates::common.errors')

	<div class="row">
		{!! Form::model($pucGrupo, ['route' => ['admin.puc.grupos.update', $pucGrupo->id], 'method' => 'patch']) !!}

		@include('admin.puc.pucGrupos.fields')

		{!! Form::close() !!}
	</div>
@endsection
