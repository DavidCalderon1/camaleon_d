<table class="table table-responsive" id="cuentaClases-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Ajuste</th>
        <th>Cntc Naturaleza</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cuentaClases as $cuentaClase)
        <tr>
            <td>{!! $cuentaClase->nombre !!}</td>
            <td>{!! $cuentaClase->descripcion !!}</td>
            <td>{!! $cuentaClase->ajuste !!}</td>
            <td>{!! $cuentaClase->cntc_naturaleza !!}</td>
            <td>
                {!! Form::open(['route' => ['clases.destroy', $cuentaClase->cntc_id], 'method' => 'delete']) !!}
                <div class='btn-group btn-group-vertical'>
                    <a href="{!! route('clases.show', [$cuentaClase->cntc_id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-search"></i></a>
                    <a href="{!! route('clases.edit', [$cuentaClase->cntc_id]) !!}" class='btn btn-default btn-sm' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Eliminar', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>