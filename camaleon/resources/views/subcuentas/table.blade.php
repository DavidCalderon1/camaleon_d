<table class="table table-responsive" id="subcuentas-table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Ajuste</th>
        <th>Nativa</th>
        <th>Cuenta id</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($subcuentas as $subcuenta)
        <tr>
            <td>{!! $subcuenta->scnt_id !!}</td>
            <td>{!! $subcuenta->nombre !!}</td>
            <td>{!! $subcuenta->descripcion !!}</td>
            <td>{!! $subcuenta->ajuste !!}</td>
            <td>{!! $subcuenta->scnt_nativa !!}</td>
            <td>{!! $subcuenta->scnt_cntid !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.datos.puc.subcuentas.destroy', $subcuenta->scnt_id], 'method' => 'delete']) !!}
                <div class='btn-group btn-group-vertical'>
                    <a href="{!! route('admin.datos.puc.subcuentas.show', [$subcuenta->scnt_id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.datos.puc.subcuentas.edit', [$subcuenta->scnt_id]) !!}" class='btn btn-default btn-sm' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Eliminar', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
