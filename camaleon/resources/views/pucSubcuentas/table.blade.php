<table class="table table-responsive" id="pucSubcuentas-table">
    <thead>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Ajuste</th>
        <th>Nativa</th>
        <th>Cuenta Id</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pucSubcuentas as $pucSubcuenta)
        <tr>
            <td>{!! $pucSubcuenta->codigo !!}</td>
            <td>{!! $pucSubcuenta->nombre !!}</td>
            <td>{!! $pucSubcuenta->descripcion !!}</td>
            <td>{!! $pucSubcuenta->ajuste !!}</td>
            <td>{!! $pucSubcuenta->nativa !!}</td>
            <td>{!! $pucSubcuenta->cuenta_id !!}</td>
            <td>{!! $pucSubcuenta->created_at !!}</td>
            <td>{!! $pucSubcuenta->updated_at !!}</td>
            <td>{!! $pucSubcuenta->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['pucSubcuentas.destroy', $pucSubcuenta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pucSubcuentas.show', [$pucSubcuenta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pucSubcuentas.edit', [$pucSubcuenta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>