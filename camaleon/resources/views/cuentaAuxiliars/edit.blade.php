@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit cuenta_auxiliar</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cuentaAuxiliar, ['route' => ['cuentaAuxiliars.update', $cuentaAuxiliar->cntaux_id], 'method' => 'patch']) !!}

            @include('cuentaAuxiliars.fields')

            {!! Form::close() !!}
        </div>
@endsection