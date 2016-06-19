<table class="table table-responsive" id="pucSubcuentas-table">
    <thead>
        <th>Código</th>
        <th>Nombre</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($pucSubcuentas as $pucSubcuenta)
        <tr>
            <td>{!! $pucSubcuenta->codigo !!}</td>
            <td>{!! $pucSubcuenta->nombre !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.puc.subcuentas.show', [$pucSubcuenta->id]) !!}" class='btn btn-default btn-sm' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>