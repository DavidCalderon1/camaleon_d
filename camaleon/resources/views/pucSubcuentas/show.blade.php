@extends('layouts.app')

@section('content')
    @include('pucSubcuentas.show_fields')

    <div class="form-group">
           <a href="{!! route('pucSubcuentas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
