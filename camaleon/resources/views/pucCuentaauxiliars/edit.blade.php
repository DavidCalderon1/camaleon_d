@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit puc_cuentaauxiliar</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($pucCuentaauxiliar, ['route' => ['pucCuentaauxiliars.update', $pucCuentaauxiliar->id], 'method' => 'patch']) !!}

            @include('pucCuentaauxiliars.fields')

            {!! Form::close() !!}
        </div>
@endsection