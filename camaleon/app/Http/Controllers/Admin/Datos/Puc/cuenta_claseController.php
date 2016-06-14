<?php

namespace App\Http\Controllers\Admin\Datos\Puc;

use App\Http\Requests;
use App\Http\Requests\Createcuenta_claseRequest;
use App\Http\Requests\Updatecuenta_claseRequest;
use App\Repositories\cuenta_claseRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class cuenta_claseController extends \App\Http\Controllers\AppBaseController
{
    /** @var  cuenta_claseRepository */
    private $cuentaClaseRepository;

    public function __construct(cuenta_claseRepository $cuentaClaseRepo)
    {
        $this->cuentaClaseRepository = $cuentaClaseRepo;
    }


    /**
     * Display a listing of the cuenta_clase.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cuentaClaseRepository->pushCriteria(new RequestCriteria($request));
        $cuentaClases = $this->cuentaClaseRepository->paginate(5);

        return view('cuentaClases.index')
            ->with('cuentaClases', $cuentaClases);
    }

    /**
     * Show the form for creating a new cuenta_clase.
     *
     * @return Response
     */
    public function create()
    {
        return view('cuentaClases.create');
    }

    /**
     * Store a newly created cuenta_clase in storage.
     *
     * @param Createcuenta_claseRequest $request
     *
     * @return Response
     */
    public function store(Createcuenta_claseRequest $request)
    {
        $input = $request->all();

        $cuentaClase = $this->cuentaClaseRepository->create($input);

        Flash::success('Clase guardada correctamente.');

        return redirect(route('admin.datos.puc.clases.index'));
    }

    /**
     * Display the specified cuenta_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cuentaClase = $this->cuentaClaseRepository->findWithoutFail($id);

        if (empty($cuentaClase)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.datos.puc.clases.index'));
        }

        return view('cuentaClases.show')->with('cuentaClase', $cuentaClase);
    }

    /**
     * Show the form for editing the specified cuenta_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cuentaClase = $this->cuentaClaseRepository->findWithoutFail($id);

        if (empty($cuentaClase)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.datos.puc.clases.index'));
        }

        return view('cuentaClases.edit')->with('cuentaClase', $cuentaClase);
    }

    /**
     * Update the specified cuenta_clase in storage.
     *
     * @param  int              $id
     * @param Updatecuenta_claseRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecuenta_claseRequest $request)
    {
        $cuentaClase = $this->cuentaClaseRepository->findWithoutFail($id);
		//consulta si existe un registro con el cntc_id enviado
        $consultaId = $this->cuentaClaseRepository->findWithoutFail($request->cntc_id);

        if (empty($cuentaClase)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.datos.puc.clases.index'));
        }
		//valida que no exista un registro con el mismo cntc_id
		if( count($consultaId) > 0 && $id !== $request->cntc_id ){
			Flash::error('Ya existe una Clase con ese Id');
			//regresa al formulario de actualizacion del recurso
            return redirect(route( 'admin.datos.puc.clases.edit',['id' => $id] ));
		}

        $cuentaClase = $this->cuentaClaseRepository->update($request->all(), $id);

        Flash::success('Clase actualizada correctamente.');

        return redirect(route('admin.datos.puc.clases.index'));
    }

    /**
     * Remove the specified cuenta_clase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cuentaClase = $this->cuentaClaseRepository->findWithoutFail($id);

        if (empty($cuentaClase)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.datos.puc.clases.index'));
        }

        $this->cuentaClaseRepository->delete($id);

        Flash::success('Clase eliminada correctamente.');

        return redirect(route('admin.datos.puc.clases.index'));
    }
}
