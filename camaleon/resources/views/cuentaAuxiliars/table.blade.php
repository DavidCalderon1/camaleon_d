<table class="table table-responsive" id="cuentaAuxiliars-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Ajuste</th>
        <th>Reqta</th>
        <th>Estado</th>
        <th>Cntaux Scntid</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cuentaAuxiliars as $cuentaAuxiliar)
        <tr>
            <td>{!! $cuentaAuxiliar->nombre !!}</td>
            <td>{!! $cuentaAuxiliar->descripcion !!}</td>
            <td>{!! $cuentaAuxiliar->ajuste !!}</td>
            <td>{!! $cuentaAuxiliar->reqta !!}</td>
            <td>{!! $cuentaAuxiliar->estado !!}</td>
            <td>{!! $cuentaAuxiliar->cntaux_scntid !!}</td>
            <td>
                {!! Form::open(['route' => ['cuentaAuxiliars.destroy', $cuentaAuxiliar->cntaux_id], 'method' => 'delete']) !!}
                <div class='btn-group btn-group-vertical'>
                    <a href="{!! route('cuentaAuxiliars.show', [$cuentaAuxiliar->cntaux_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cuentaAuxiliars.edit', [$cuentaAuxiliar->cntaux_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>