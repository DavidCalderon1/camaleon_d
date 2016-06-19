<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_cuentaRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_cuentaRequest;
use App\Repositories\Admin\Puc\puc_cuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Admin\Puc\puc_grupo;

class puc_cuentaController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_cuentaRepository */
    private $pucCuentaRepository;
    private $pucGrupo;

    public function __construct(puc_cuentaRepository $pucCuentaRepo)
    {
        $this->pucCuentaRepository = $pucCuentaRepo;
		//se lista el nombre y el id correspondiente a todos los puc_grupo
		$this->pucGrupo =  puc_grupo::orderBy('id')->lists('nombre', 'id');
    }

    /**
     * Display a listing of the puc_cuenta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucCuentaRepository->pushCriteria(new RequestCriteria($request));
        $pucCuentas = $this->pucCuentaRepository->orderBy('codigo', 'asc')->paginate(15);

        return view('admin.puc.pucCuentas.index')
            ->with('pucCuentas', $pucCuentas);
    }

    /**
     * Show the form for creating a new puc_cuenta.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.puc.pucCuentas.create')->with('pucGrupo', $this->pucGrupo);
    }

    /**
     * Store a newly created puc_cuenta in storage.
     *
     * @param Createpuc_cuentaRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_cuentaRequest $request)
    {
        $input = $request->all();

        $pucCuenta = $this->pucCuentaRepository->create($input);

        Flash::success('Cuenta guardada correctamente.');

        //return redirect(route('admin.puc.cuentas.index'));
		return redirect(route('admin.puc.cuentas.show',$pucCuenta->id) );
    }

    /**
     * Display the specified puc_cuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pucCuenta = $this->pucCuentaRepository->findWithoutFail($id);

        if (empty($pucCuenta)) {
            Flash::error('Cuenta no encontrada');

            return redirect(route('admin.puc.cuentas.index'));
        }

        return view('admin.puc.pucCuentas.show')->with('pucCuenta', $pucCuenta);
    }

    /**
     * Show the form for editing the specified puc_cuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pucCuenta = $this->pucCuentaRepository->findWithoutFail($id);

        if (empty($pucCuenta)) {
            Flash::error('Cuenta no encontrada');

            return redirect(route('admin.puc.cuentas.index'));
        }

        return view('admin.puc.pucCuentas.edit', ['pucCuenta' => $pucCuenta, 'pucGrupo' => $this->pucGrupo]);
    }

    /**
     * Update the specified puc_cuenta in storage.
     *
     * @param  int              $id
     * @param Updatepuc_cuentaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_cuentaRequest $request)
    {
        $pucCuenta = $this->pucCuentaRepository->findWithoutFail($id);
		//consulta si existe un registro con el codigo enviado
		$consultaId = $this->pucCuentaRepository->findWithoutFail($request->codigo);
		
        if (empty($pucCuenta)) {
            Flash::error('Cuenta no encontrada');

            return redirect(route('admin.puc.cuentas.index'));
        }
		//valida que no exista un registro con el mismo codigo
		if( count($consultaId) > 0 && $pucCuenta->codigo !== $request->codigo ){
			Flash::error('Ya existe una Cuenta con ese Código');
				
			//regresa al formulario de actualizacion del recurso
			return redirect(route( 'admin.puc.cuentas.edit',['id' => $id] ));
				
		}

        $pucCuenta = $this->pucCuentaRepository->update($request->all(), $id);

        Flash::success('Cuenta actualizada correctamente.');

        //return redirect(route('admin.puc.cuentas.index'));
        return redirect(route('admin.puc.cuentas.show',$pucCuenta->id) );
    }

    /**
     * Remove the specified puc_cuenta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pucCuenta = $this->pucCuentaRepository->findWithoutFail($id);

        if (empty($pucCuenta)) {
            Flash::error('Cuenta no encontrada');

            return redirect(route('admin.puc.cuentas.index'));
        }

        $this->pucCuentaRepository->delete($id);

        Flash::success('Cuenta eliminada correctamente.');

        return redirect(route('admin.puc.cuentas.index'));
    }
}
