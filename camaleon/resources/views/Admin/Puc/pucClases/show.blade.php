@extends('layouts.principal')

@section('content')
	@include('flash::message')
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Clase</h1>
        </div>
    </div>
	<div class="row">
		@include('Admin.Puc.pucClases.show_fields')
		
		{!! Form::open(['route' => ['admin.puc.clases.destroy', $pucClase->id], 'method' => 'delete']) !!}
			<div class="form-group col-sm-12">
				<!--a href="{!! route('admin.puc.clases.index') !!}" class="btn btn-default" role="button" title='Atras'><i class="glyphicon glyphicon-menu-left"></i> Atras</a-->
				<a href="{{ URL::previous() }}" class="btn btn-default" role="button" title='Atras'><i class="glyphicon glyphicon-menu-left"></i> Atras</a>
				<a href="{!! route('admin.puc.clases.edit', [$pucClase->id]) !!}" class='btn btn-primary' role="button" title='Editar'><i class="glyphicon glyphicon-edit"></i> Editar</a>
				{!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Eliminar', 'onclick' => "return confirm('Esta seguro?')"]) !!}
			</div>
		{!! Form::close() !!}
	</div>
@endsection