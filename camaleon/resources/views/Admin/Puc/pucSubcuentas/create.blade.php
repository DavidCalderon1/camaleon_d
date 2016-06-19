@extends('layouts.principal')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Crear nueva subcuenta</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'admin.puc.subcuentas.store']) !!}

            @include('admin.puc.pucSubcuentas.fields')

        {!! Form::close() !!}
    </div>
@endsection