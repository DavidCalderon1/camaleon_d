@extends('layouts.admin')

@section('content')
    @include('subcuentas.show_fields')

    <div class="form-group">
           <a href="{!! route('subcuentas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
