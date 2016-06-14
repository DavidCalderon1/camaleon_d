<table class="table table-responsive" id="pucGrupos-table">
    <thead>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Ajuste</th>
        <th>Nativa</th>
        <th>Clase Id</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pucGrupos as $pucGrupo)
        <tr>
            <td>{!! $pucGrupo->codigo !!}</td>
            <td>{!! $pucGrupo->nombre !!}</td>
            <td>{!! $pucGrupo->descripcion !!}</td>
            <td>{!! $pucGrupo->ajuste !!}</td>
            <td>{!! $pucGrupo->nativa !!}</td>
            <td>{!! $pucGrupo->clase_id !!}</td>
            <td>{!! $pucGrupo->created_at !!}</td>
            <td>{!! $pucGrupo->updated_at !!}</td>
            <td>{!! $pucGrupo->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['pucGrupos.destroy', $pucGrupo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pucGrupos.show', [$pucGrupo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pucGrupos.edit', [$pucGrupo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>