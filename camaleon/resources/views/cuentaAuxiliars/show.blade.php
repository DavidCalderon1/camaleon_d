@extends('layouts.admin')

@section('content')
    @include('cuentaAuxiliars.show_fields')

    <div class="form-group">
           <a href="{!! route('cuentaAuxiliars.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
