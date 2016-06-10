@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New subcuenta</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'subcuentas.store']) !!}

            @include('subcuentas.fields')

        {!! Form::close() !!}
    </div>
@endsection