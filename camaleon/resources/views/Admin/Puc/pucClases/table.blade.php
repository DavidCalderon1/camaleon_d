<table class="table table-responsive" id="pucClases-table">
    <thead>
        <th>Código</th>
        <th>Nombre</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($pucClases as $pucClase)
        <tr>
            <td>{!! $pucClase->codigo !!}</td>
            <td>{!! $pucClase->nombre !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.puc.clases.show', [$pucClase->id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>