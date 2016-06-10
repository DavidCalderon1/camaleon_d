@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit subcuenta</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($subcuenta, ['route' => ['subcuentas.update', $subcuenta->scnt_id], 'method' => 'patch']) !!}

            @include('subcuentas.fields')

            {!! Form::close() !!}
        </div>
@endsection