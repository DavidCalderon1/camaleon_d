<table class="table table-responsive" id="cuentaGrupos-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Ajuste</th>
        <th>Cntg Cntcid</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cuentaGrupos as $cuentaGrupo)
        <tr>
            <td>{!! $cuentaGrupo->nombre !!}</td>
            <td>{!! $cuentaGrupo->descripcion !!}</td>
            <td>{!! $cuentaGrupo->ajuste !!}</td>
            <td>{!! $cuentaGrupo->cntg_cntcid !!}</td>
            <td>
                {!! Form::open(['route' => ['cuentaGrupos.destroy', $cuentaGrupo->cntg_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cuentaGrupos.show', [$cuentaGrupo->cntg_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cuentaGrupos.edit', [$cuentaGrupo->cntg_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>