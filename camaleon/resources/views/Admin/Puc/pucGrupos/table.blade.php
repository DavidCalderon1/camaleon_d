<table class="table table-responsive" id="pucGrupos-table">
    <thead>
        <th>Código</th>
        <th>Nombre</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($pucGrupos as $pucGrupo)
        <tr>
            <td>{!! $pucGrupo->codigo !!}</td>
            <td>{!! $pucGrupo->nombre !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.puc.grupos.show', [$pucGrupo->id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
