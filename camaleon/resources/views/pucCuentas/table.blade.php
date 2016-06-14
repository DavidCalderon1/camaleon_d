<table class="table table-responsive" id="pucCuentas-table">
    <thead>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Ajuste</th>
        <th>Nativa</th>
        <th>Grupo Id</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pucCuentas as $pucCuenta)
        <tr>
            <td>{!! $pucCuenta->codigo !!}</td>
            <td>{!! $pucCuenta->nombre !!}</td>
            <td>{!! $pucCuenta->descripcion !!}</td>
            <td>{!! $pucCuenta->ajuste !!}</td>
            <td>{!! $pucCuenta->nativa !!}</td>
            <td>{!! $pucCuenta->grupo_id !!}</td>
            <td>{!! $pucCuenta->created_at !!}</td>
            <td>{!! $pucCuenta->updated_at !!}</td>
            <td>{!! $pucCuenta->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['pucCuentas.destroy', $pucCuenta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pucCuentas.show', [$pucCuenta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pucCuentas.edit', [$pucCuenta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>