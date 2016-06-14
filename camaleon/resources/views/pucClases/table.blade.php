<table class="table table-responsive" id="pucClases-table">
    <thead>
        <th>Código</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Ajuste</th>
        <th>Naturaleza</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($pucClases as $pucClase)
        <tr>
            <td>{!! $pucClase->codigo !!}</td>
            <td>{!! $pucClase->nombre !!}</td>
            <td>{!! $pucClase->descripcion !!}</td>
            <td>{!! $pucClase->ajuste !!}</td>
            <td>{!! $pucClase->naturaleza !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.datos.puc.clases.destroy', $pucClase->id], 'method' => 'delete']) !!}
                <div class='btn-group btn-group-vertical'>
                    <a href="{!! route('admin.datos.puc.clases.show', [$pucClase->id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-search"></i></a>
                    <a href="{!! route('admin.datos.puc.clases.edit', [$pucClase->id]) !!}" class='btn btn-default btn-sm' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Eliminar', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>