@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Crear Nueva Clase</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'clases.store']) !!}

            @include('cuentaClases.fields')

        {!! Form::close() !!}
    </div>
@endsection