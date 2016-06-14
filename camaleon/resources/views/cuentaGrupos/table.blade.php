<table class="table table-responsive" id="cuentaGrupos-table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Ajuste</th>
        <th>Clase id</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($cuentaGrupos as $cuentaGrupo)
        <tr>
            <td>{!! $cuentaGrupo->cntg_id !!}</td>
            <td>{!! $cuentaGrupo->nombre !!}</td>
            <td>{!! $cuentaGrupo->descripcion !!}</td>
            <td>{!! $cuentaGrupo->ajuste !!}</td>
            <td>{!! $cuentaGrupo->cntg_cntcid !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.datos.puc.grupos.destroy', $cuentaGrupo->cntg_id], 'method' => 'delete']) !!}
                <div class='btn-group btn-group-vertical'>
                    <a href="{!! route('admin.datos.puc.grupos.show', [$cuentaGrupo->cntg_id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.datos.puc.grupos.edit', [$cuentaGrupo->cntg_id]) !!}" class='btn btn-default btn-sm' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Eliminar', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>