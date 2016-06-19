<table class="table table-responsive" id="pucCuentas-table">
    <thead>
        <th>Código</th>
        <th>Nombre</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($pucCuentas as $pucCuenta)
        <tr>
            <td>{!! $pucCuenta->codigo !!}</td>
            <td>{!! $pucCuenta->nombre !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.puc.cuentas.show', [$pucCuenta->id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
