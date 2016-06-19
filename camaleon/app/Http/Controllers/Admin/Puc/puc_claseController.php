<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_claseRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_claseRequest;
use App\Repositories\Admin\Puc\puc_claseRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class puc_claseController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_claseRepository */
    private $pucClaseRepository;

    public function __construct(puc_claseRepository $pucClaseRepo)
    {
        $this->pucClaseRepository = $pucClaseRepo;
    }

    /**
     * Display a listing of the puc_clase.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucClaseRepository->pushCriteria(new RequestCriteria($request));
        $pucClases = $this->pucClaseRepository->orderBy('codigo', 'asc')->paginate(15);

        return view('Admin.Puc.pucClases.index')
            ->with('pucClases', $pucClases);
    }

    /**
     * Show the form for creating a new puc_clase.
     *
     * @return Response
     */
    public function create()
    {
        return view('Admin.Puc.pucClases.create');
    }

    /**
     * Store a newly created puc_clase in storage.
     *
     * @param Createpuc_claseRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_claseRequest $request)
    {
        $input = $request->all();

        $pucClase = $this->pucClaseRepository->create($input);

        Flash::success('Clase guardada correctamente.');

        //return redirect(route('admin.puc.clases.index'));
		return redirect(route('admin.puc.clases.show',$pucClase->id) );
    }

    /**
     * Display the specified puc_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pucClase = $this->pucClaseRepository->findWithoutFail($id);

        if (empty($pucClase)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.puc.clases.index'));
        }

        return view('Admin.Puc.pucClases.show')->with('pucClase', $pucClase);
    }

    /**
     * Show the form for editing the specified puc_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pucClase = $this->pucClaseRepository->findWithoutFail($id);

        if (empty($pucClase)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.puc.clases.index'));
        }

        return view('Admin.Puc.pucClases.edit')->with('pucClase', $pucClase);
    }

    /**
     * Update the specified puc_clase in storage.
     *
     * @param  int              $id
     * @param Updatepuc_claseRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_claseRequest $request)
    {
        $pucClase = $this->pucClaseRepository->findWithoutFail($id);
	//consulta si existe un registro con el codigo enviado
        $consultaId = $this->pucClaseRepository->findWithoutFail($request->codigo);

        if (empty($pucClase)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.puc.clases.index'));
        }
		//valida que no exista un registro con el mismo codigo
		if( count($consultaId) > 0 && $id !== $request->codigo ){
			Flash::error('Ya existe una Clase con ese código');
			//regresa al formulario de actualizacion del recurso
			return redirect(route( 'admin.puc.clases.edit',['id' => $id] ));
		}

        $pucClase = $this->pucClaseRepository->update($request->all(), $id);

        Flash::success('Clase actualizada correctamente.');

        //return redirect(route('admin.puc.clases.index'));
		return redirect(route('admin.puc.clases.show',$pucClase->id) );
    }

    /**
     * Remove the specified puc_clase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pucClase = $this->pucClaseRepository->findWithoutFail($id);

        if (empty($pucClase)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.puc.clases.index'));
        }

        $this->pucClaseRepository->delete($id);

        Flash::success('Clase eliminada correctamente.');

        return redirect(route('admin.puc.clases.index'));
    }
}
