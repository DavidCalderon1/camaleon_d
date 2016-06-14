@extends('layouts.principal')

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Cuenta</h1>
        </div>
    </div>
    @include('cuentas.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.datos.puc.cuentas.index') !!}" class="btn btn-default">Atras</a>
    </div>
@endsection
