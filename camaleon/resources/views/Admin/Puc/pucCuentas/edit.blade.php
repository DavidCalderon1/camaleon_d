@extends( $peticion == "normal" ? 'layouts.principal' : 'layouts.empty' )

@section('content')
	<div class="row clearfix">
		<div class="col-sm-12">
			<h1 class="pull-left">{{ $title_page='Editar '.$nombre }}</h1>
		</div>
	</div>
	@include('flash::message')
	@include('core-templates::common.errors')
	@include('layouts.alerts')

	<div class="row">
		{!! Form::model($pucCuenta, ['route' => ['admin.puc.'.$ruta.'.update', $pucCuenta->id], 'method' => 'patch', 'class' => 'form_update']) !!}

		@include('admin.puc.pucCuentas.fields')

		{!! Form::close() !!}
	</div>
@endsection

@section('scripts')
	@if( isset($peticion) && $peticion == 'normal' )
	{!! Html::script('/general/js/script_select_scroll.js') !!}
	@endif
@endsection
