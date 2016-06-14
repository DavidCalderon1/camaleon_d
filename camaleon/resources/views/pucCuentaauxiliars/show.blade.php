@extends('layouts.app')

@section('content')
    @include('pucCuentaauxiliars.show_fields')

    <div class="form-group">
           <a href="{!! route('pucCuentaauxiliars.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
