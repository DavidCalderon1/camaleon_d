@extends('layouts.principal')

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Subcuenta</h1>
        </div>
    </div>

    @include('subcuentas.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.datos.puc.subcuentas.index') !!}" class="btn btn-default">Atras</a>
    </div>
@endsection
