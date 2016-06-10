@extends('layouts.admin')

@section('content')
    @include('cuentas.show_fields')

    <div class="form-group">
           <a href="{!! route('cuentas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
