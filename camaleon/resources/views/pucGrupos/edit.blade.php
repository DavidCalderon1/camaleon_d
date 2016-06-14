@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit puc_grupo</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($pucGrupo, ['route' => ['pucGrupos.update', $pucGrupo->id], 'method' => 'patch']) !!}

            @include('pucGrupos.fields')

            {!! Form::close() !!}
        </div>
@endsection