@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New cuenta_auxiliar</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'cuentaAuxiliars.store']) !!}

            @include('cuentaAuxiliars.fields')

        {!! Form::close() !!}
    </div>
@endsection