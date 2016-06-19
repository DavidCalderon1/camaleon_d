@extends('layouts.principal')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar cuenta auxiliar</h1>
            </div>
        </div>
		@include('flash::message')
        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($pucCuentaauxiliar, ['route' => ['admin.puc.cuentasauxiliares.update', $pucCuentaauxiliar->id], 'method' => 'patch']) !!}

            @include('admin.puc.pucCuentaauxiliars.fields')

            {!! Form::close() !!}
        </div>
@endsection