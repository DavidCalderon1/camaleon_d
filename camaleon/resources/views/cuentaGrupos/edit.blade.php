@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit cuenta_grupo</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cuentaGrupo, ['route' => ['cuentaGrupos.update', $cuentaGrupo->cntg_id], 'method' => 'patch']) !!}

            @include('cuentaGrupos.fields')

            {!! Form::close() !!}
        </div>
@endsection