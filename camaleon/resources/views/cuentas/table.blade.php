<table class="table table-responsive" id="cuentas-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Ajuste</th>
        <th>Cnt Cntgid</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cuentas as $cuenta)
        <tr>
            <td>{!! $cuenta->nombre !!}</td>
            <td>{!! $cuenta->descripcion !!}</td>
            <td>{!! $cuenta->ajuste !!}</td>
            <td>{!! $cuenta->cnt_cntgid !!}</td>
            <td>
                {!! Form::open(['route' => ['cuentas.destroy', $cuenta->cnt_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cuentas.show', [$cuenta->cnt_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cuentas.edit', [$cuenta->cnt_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>