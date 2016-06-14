@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit puc_cuenta</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($pucCuenta, ['route' => ['pucCuentas.update', $pucCuenta->id], 'method' => 'patch']) !!}

            @include('pucCuentas.fields')

            {!! Form::close() !!}
        </div>
@endsection