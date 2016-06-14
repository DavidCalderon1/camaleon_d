@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit puc_subcuenta</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($pucSubcuenta, ['route' => ['pucSubcuentas.update', $pucSubcuenta->id], 'method' => 'patch']) !!}

            @include('pucSubcuentas.fields')

            {!! Form::close() !!}
        </div>
@endsection