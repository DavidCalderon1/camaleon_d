<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_subcuentaRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_subcuentaRequest;
use App\Repositories\Admin\Puc\puc_subcuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Admin\Puc\puc_cuenta;

class puc_subcuentaController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_subcuentaRepository */
    private $pucSubcuentaRepository;
	private $pucCuenta;

    public function __construct(puc_subcuentaRepository $pucSubcuentaRepo)
    {
        $this->pucSubcuentaRepository = $pucSubcuentaRepo;
		//se lista el nombre y el id correspondiente a todos los puc_cuenta
		$this->pucCuenta =  puc_cuenta::orderBy('id')->lists('nombre', 'id');
    }

    /**
     * Display a listing of the puc_subcuenta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucSubcuentaRepository->pushCriteria(new RequestCriteria($request));
        $pucSubcuentas = $this->pucSubcuentaRepository->orderBy('codigo', 'asc')->paginate(15);

        return view('Admin.Puc.pucSubcuentas.index')
            ->with('pucSubcuentas', $pucSubcuentas);
    }

    /**
     * Show the form for creating a new puc_subcuenta.
     *
     * @return Response
     */
    public function create()
    {
        return view('Admin.Puc.pucSubcuentas.create')->with('pucCuenta', $this->pucCuenta);
    }

    /**
     * Store a newly created puc_subcuenta in storage.
     *
     * @param Createpuc_subcuentaRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_subcuentaRequest $request)
    {
        $input = $request->all();

        $pucSubcuenta = $this->pucSubcuentaRepository->create($input);

        Flash::success('Subcuenta guardada correctamente.');

	return redirect(route('admin.puc.subcuentas.show',$pucSubcuenta->id) );
    }

    /**
     * Display the specified puc_subcuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pucSubcuenta = $this->pucSubcuentaRepository->findWithoutFail($id);

        if (empty($pucSubcuenta)) {
            Flash::error('Subcuenta no encontrada');

            return redirect(route('admin.puc.subcuentas.index'));
        }

        return view('Admin.Puc.pucSubcuentas.show')->with('pucSubcuenta', $pucSubcuenta);
    }

    /**
     * Show the form for editing the specified puc_subcuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pucSubcuenta = $this->pucSubcuentaRepository->findWithoutFail($id);

        if (empty($pucSubcuenta)) {
            Flash::error('Subcuenta no encontrada');

            return redirect(route('admin.puc.subcuentas.index'));
        }

        return view('Admin.Puc.pucSubcuentas.edit', ['pucSubcuenta' => $pucSubcuenta, 'pucCuenta' => $this->pucCuenta]);
	
    }

    /**
     * Update the specified puc_subcuenta in storage.
     *
     * @param  int              $id
     * @param Updatepuc_subcuentaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_subcuentaRequest $request)
    {
        $pucSubcuenta = $this->pucSubcuentaRepository->findWithoutFail($id);
	//consulta si existe un registro con el codigo enviado
        $consultaId = $this->pucSubcuentaRepository->findWithoutFail($request->codigo);

        if (empty($pucSubcuenta)) {
            Flash::error('Subcuenta no encontrada');

            return redirect(route('admin.puc.subcuentas.index'));
        }
		//valida que no exista un registro con el mismo codigo
		if( count($consultaId) > 0 && $pucSubcuenta->codigo  !== $request->codigo ){
			Flash::error('Ya existe una Subcuenta con ese código');
			//regresa al formulario de actualizacion del recurso
			return redirect(route( 'admin.puc.subcuentas.edit',['id' => $id] ));
		}

        $pucSubcuenta = $this->pucSubcuentaRepository->update($request->all(), $id);

        Flash::success('Subcuenta actualizada correctamente.');

        return redirect(route('admin.puc.subcuentas.show',$pucSubcuenta->id) );
    }

    /**
     * Remove the specified puc_subcuenta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pucSubcuenta = $this->pucSubcuentaRepository->findWithoutFail($id);

        if (empty($pucSubcuenta)) {
            Flash::error('Subcuenta no encontrada');

            return redirect(route('admin.puc.subcuentas.index'));
        }

        $this->pucSubcuentaRepository->delete($id);

        Flash::success('Subcuenta eliminada correctamente.');

        return redirect(route('admin.puc.subcuentas.index'));
    }
}
