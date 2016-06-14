@extends('layouts.app')

@section('content')
    @include('pucCuentas.show_fields')

    <div class="form-group">
           <a href="{!! route('pucCuentas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
