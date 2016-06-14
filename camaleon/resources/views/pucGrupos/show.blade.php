@extends('layouts.app')

@section('content')
    @include('pucGrupos.show_fields')

    <div class="form-group">
           <a href="{!! route('pucGrupos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
