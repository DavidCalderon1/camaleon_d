<table class="table table-responsive" id="cuentaAuxiliars-table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Ajuste</th>
        <th>Reqta</th>
        <th>Estado</th>
        <th>Subcuenta id</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($cuentaAuxiliars as $cuentaAuxiliar)
        <tr>
            <td>{!! $cuentaAuxiliar->cntaux_id !!}</td>
            <td>{!! $cuentaAuxiliar->nombre !!}</td>
            <td>{!! $cuentaAuxiliar->descripcion !!}</td>
            <td>{!! $cuentaAuxiliar->ajuste !!}</td>
            <td>{!! $cuentaAuxiliar->reqta !!}</td>
            <td>{!! $cuentaAuxiliar->estado !!}</td>
            <td>{!! $cuentaAuxiliar->cntaux_scntid !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.datos.puc.cuentasAuxiliares.destroy', $cuentaAuxiliar->cntaux_id], 'method' => 'delete']) !!}
                <div class='btn-group btn-group-vertical'>
                    <a href="{!! route('admin.datos.puc.cuentasAuxiliares.show', [$cuentaAuxiliar->cntaux_id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.datos.puc.cuentasAuxiliares.edit', [$cuentaAuxiliar->cntaux_id]) !!}" class='btn btn-default btn-sm' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Eliminar', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>