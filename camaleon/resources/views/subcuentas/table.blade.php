<table class="table table-responsive" id="subcuentas-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Ajuste</th>
        <th>Scnt Nativa</th>
        <th>Scnt Cntid</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($subcuentas as $subcuenta)
        <tr>
            <td>{!! $subcuenta->nombre !!}</td>
            <td>{!! $subcuenta->descripcion !!}</td>
            <td>{!! $subcuenta->ajuste !!}</td>
            <td>{!! $subcuenta->scnt_nativa !!}</td>
            <td>{!! $subcuenta->scnt_cntid !!}</td>
            <td>
                {!! Form::open(['route' => ['subcuentas.destroy', $subcuenta->scnt_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subcuentas.show', [$subcuenta->scnt_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subcuentas.edit', [$subcuenta->scnt_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>