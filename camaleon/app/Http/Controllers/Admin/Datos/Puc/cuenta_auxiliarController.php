<?php

namespace App\Http\Controllers\Admin\Datos\Puc;

use App\Http\Requests;
use App\Http\Requests\Createcuenta_auxiliarRequest;
use App\Http\Requests\Updatecuenta_auxiliarRequest;
use App\Repositories\cuenta_auxiliarRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\subcuenta;

class cuenta_auxiliarController extends \App\Http\Controllers\AppBaseController
{
    /** @var  cuenta_auxiliarRepository */
    private $cuentaAuxiliarRepository;
    private $subcuenta;

    public function __construct(cuenta_auxiliarRepository $cuentaAuxiliarRepo)
    {
        $this->cuentaAuxiliarRepository = $cuentaAuxiliarRepo;
	//se lista el nombre y el id correspondiente a todas las subcuentas
	$this->subcuenta =  subcuenta::lists('nombre', 'scnt_id');
    }

    /**
     * Display a listing of the cuenta_auxiliar.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cuentaAuxiliarRepository->pushCriteria(new RequestCriteria($request));
        $cuentaAuxiliars = $this->cuentaAuxiliarRepository->paginate(5);

        return view('cuentaAuxiliars.index')
            ->with('cuentaAuxiliars', $cuentaAuxiliars);
    }

    /**
     * Show the form for creating a new cuenta_auxiliar.
     *
     * @return Response
     */
    public function create()
    {
        return view('cuentaAuxiliars.create')->with('subcuenta', $this->subcuenta);
    }

    /**
     * Store a newly created cuenta_auxiliar in storage.
     *
     * @param Createcuenta_auxiliarRequest $request
     *
     * @return Response
     */
    public function store(Createcuenta_auxiliarRequest $request)
    {
        $input = $request->all();

        $cuentaAuxiliar = $this->cuentaAuxiliarRepository->create($input);

        Flash::success('Cuenta auxiliar guardada correctamente.');

        return redirect(route('admin.datos.puc.cuentasAuxiliares.index'));
    }

    /**
     * Display the specified cuenta_auxiliar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cuentaAuxiliar = $this->cuentaAuxiliarRepository->findWithoutFail($id);

        if (empty($cuentaAuxiliar)) {
            Flash::error('Cuenta auxiliar no encontrada');

            return redirect(route('admin.datos.puc.cuentasAuxiliares.index'));
        }

        return view('cuentaAuxiliars.show')->with('cuentaAuxiliar', $cuentaAuxiliar);
    }

    /**
     * Show the form for editing the specified cuenta_auxiliar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cuentaAuxiliar = $this->cuentaAuxiliarRepository->findWithoutFail($id);

        if (empty($cuentaAuxiliar)) {
            Flash::error('Cuenta auxiliar no encontrada');

            return redirect(route('admin.datos.puc.cuentasAuxiliares.index'));
        }

        return view('cuentaAuxiliars.edit', ['cuentaAuxiliar' => $cuentaAuxiliar, 'subcuenta' => $this->subcuenta]);
    }

    /**
     * Update the specified cuenta_auxiliar in storage.
     *
     * @param  int              $id
     * @param Updatecuenta_auxiliarRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecuenta_auxiliarRequest $request)
    {
        $cuentaAuxiliar = $this->cuentaAuxiliarRepository->findWithoutFail($id);
	//consulta si existe un registro con el cntaux_id enviado
	$consultaId = $this->cuentaAuxiliarRepository->findWithoutFail($request->cntaux_id);

        if (empty($cuentaAuxiliar)) {
            Flash::error('Cuenta auxiliar no encontrada');

            return redirect(route('cuentasAuxiliares.index'));
        }

	//valida que no exista un registro con el mismo cntaux_id
	if( count($consultaId) > 0 && $id !== $request->cntaux_id ){
		Flash::error('Ya existe una Cuenta auxiliar con ese Id');
		//regresa al formulario de actualizacion del recurso
    		return redirect(route( 'admin.datos.puc.cuentasAuxiliares.edit',['id' => $id] ));
	}
        $cuentaAuxiliar = $this->cuentaAuxiliarRepository->update($request->all(), $id);

        Flash::success('Cuenta auxiliar actualizada correctamente.');

        return redirect(route('admin.datos.puc.cuentasAuxiliares.index'));
    }

    /**
     * Remove the specified cuenta_auxiliar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cuentaAuxiliar = $this->cuentaAuxiliarRepository->findWithoutFail($id);

        if (empty($cuentaAuxiliar)) {
            Flash::error('Cuenta auxiliar no encontrada');

            return redirect(route('admin.datos.puc.cuentasAuxiliares.index'));
        }

        $this->cuentaAuxiliarRepository->delete($id);

        Flash::success('Cuenta auxiliar eliminada correctamente.');

        return redirect(route('admin.datos.puc.cuentasAuxiliares.index'));
    }
}
