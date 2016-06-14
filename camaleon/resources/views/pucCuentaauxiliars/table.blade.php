<table class="table table-responsive" id="pucCuentaauxiliars-table">
    <thead>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Ajuste</th>
        <th>Tercero Activo</th>
        <th>Estado</th>
        <th>Subcuenta Id</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pucCuentaauxiliars as $pucCuentaauxiliar)
        <tr>
            <td>{!! $pucCuentaauxiliar->codigo !!}</td>
            <td>{!! $pucCuentaauxiliar->nombre !!}</td>
            <td>{!! $pucCuentaauxiliar->descripcion !!}</td>
            <td>{!! $pucCuentaauxiliar->ajuste !!}</td>
            <td>{!! $pucCuentaauxiliar->tercero_activo !!}</td>
            <td>{!! $pucCuentaauxiliar->estado !!}</td>
            <td>{!! $pucCuentaauxiliar->subcuenta_id !!}</td>
            <td>{!! $pucCuentaauxiliar->created_at !!}</td>
            <td>{!! $pucCuentaauxiliar->updated_at !!}</td>
            <td>{!! $pucCuentaauxiliar->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['pucCuentaauxiliars.destroy', $pucCuentaauxiliar->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pucCuentaauxiliars.show', [$pucCuentaauxiliar->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pucCuentaauxiliars.edit', [$pucCuentaauxiliar->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>