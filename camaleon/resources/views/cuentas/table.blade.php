<table class="table table-responsive" id="cuentas-table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Ajuste</th>
        <th>Grupo id</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($cuentas as $cuenta)
        <tr>
            <td>{!! $cuenta->cnt_id !!}</td>
            <td>{!! $cuenta->nombre !!}</td>
            <td>{!! $cuenta->descripcion !!}</td>
            <td>{!! $cuenta->ajuste !!}</td>
            <td>{!! $cuenta->cnt_cntgid !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.datos.puc.cuentas.destroy', $cuenta->cnt_id], 'method' => 'delete']) !!}
                <div class='btn-group btn-group-vertical'>
                    <a href="{!! route('admin.datos.puc.cuentas.show', [$cuenta->cnt_id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.datos.puc.cuentas.edit', [$cuenta->cnt_id]) !!}" class='btn btn-default btn-sm' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Eliminar', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>