@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit cuenta</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cuenta, ['route' => ['cuentas.update', $cuenta->cnt_id], 'method' => 'patch']) !!}

            @include('cuentas.fields')

            {!! Form::close() !!}
        </div>
@endsection