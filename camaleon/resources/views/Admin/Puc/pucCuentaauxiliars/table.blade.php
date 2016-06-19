<table class="table table-responsive" id="pucCuentaauxiliars-table">
    <thead>
        <th>Código</th>
        <th>Nombre</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($pucCuentaauxiliars as $pucCuentaauxiliar)
        <tr>
            <td>{!! $pucCuentaauxiliar->codigo !!}</td>
            <td>{!! $pucCuentaauxiliar->nombre !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.puc.cuentasauxiliares.show', [$pucCuentaauxiliar->id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>