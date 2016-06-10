@extends('layouts.admin')

@section('content')
    @include('cuentaGrupos.show_fields')

    <div class="form-group">
           <a href="{!! route('cuentaGrupos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
