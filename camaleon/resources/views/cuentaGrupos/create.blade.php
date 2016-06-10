@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New cuenta_grupo</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'cuentaGrupos.store']) !!}

            @include('cuentaGrupos.fields')

        {!! Form::close() !!}
    </div>
@endsection