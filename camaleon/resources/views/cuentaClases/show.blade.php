@extends('layouts.admin')

@section('content')
    @include('cuentaClases.show_fields')

    <div class="form-group">
           <a href="{!! route('clases.index') !!}" class="btn btn-default">Regresar</a>
    </div>
@endsection
