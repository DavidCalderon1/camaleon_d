@extends('layouts.principal')

@section('content')
	@include('flash::message')
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Subcuenta</h1>
        </div>
    </div>
	<div class="row">
		@include('admin.puc.pucSubcuentas.show_fields')
		
		{!! Form::open(['route' => ['admin.puc.subcuentas.destroy', $pucSubcuenta->id], 'method' => 'delete']) !!}
			<div class="form-group col-sm-12">
				<a href="{{ URL::previous() }}" class="btn btn-default" role="button" title='Atras'><i class="glyphicon glyphicon-menu-left"></i> Atras</a>
				<a href="{!! route('admin.puc.subcuentas.edit', [$pucSubcuenta->id]) !!}" class='btn btn-primary' role="button" title='Editar'><i class="glyphicon glyphicon-edit"></i> Editar</a>
				{!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Eliminar', 'onclick' => "return confirm('Esta seguro?')"]) !!}
			</div>
		{!! Form::close() !!}
	</div>
@endsection
