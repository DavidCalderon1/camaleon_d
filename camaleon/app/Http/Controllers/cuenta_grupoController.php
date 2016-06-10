<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createcuenta_grupoRequest;
use App\Http\Requests\Updatecuenta_grupoRequest;
use App\Repositories\cuenta_grupoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\cuenta_clase;

class cuenta_grupoController extends AppBaseController
{
    /** @var  cuenta_grupoRepository */
    private $cuentaGrupoRepository;

    public function __construct(cuenta_grupoRepository $cuentaGrupoRepo)
    {
        $this->cuentaGrupoRepository = $cuentaGrupoRepo;
    }

    /**
     * Display a listing of the cuenta_grupo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cuentaGrupoRepository->pushCriteria(new RequestCriteria($request));
        $cuentaGrupos = $this->cuentaGrupoRepository->paginate(5);

        return view('cuentaGrupos.index')
            ->with('cuentaGrupos', $cuentaGrupos);
    }

    /**
     * Show the form for creating a new cuenta_grupo.
     *
     * @return Response
     */
    public function create()
    {
        //se lista el nombre y el id correspondiente a todos las cuenta_clase
		$cuentaClase = cuenta_clase::lists('nombre', 'cntc_id');
		return view('cuentaGrupos.create',compact('cuentaClase'));
		//return view('cuentaGrupos.create');
    }

    /**
     * Store a newly created cuenta_grupo in storage.
     *
     * @param Createcuenta_grupoRequest $request
     *
     * @return Response
     */
    public function store(Createcuenta_grupoRequest $request)
    {
        $input = $request->all();

        $cuentaGrupo = $this->cuentaGrupoRepository->create($input);

        Flash::success('cuenta_grupo saved successfully.');

        return redirect(route('cuentaGrupos.index'));
    }

    /**
     * Display the specified cuenta_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cuentaGrupo = $this->cuentaGrupoRepository->findWithoutFail($id);

        if (empty($cuentaGrupo)) {
            Flash::error('cuenta_grupo not found');

            return redirect(route('cuentaGrupos.index'));
        }

        return view('cuentaGrupos.show')->with('cuentaGrupo', $cuentaGrupo);
    }

    /**
     * Show the form for editing the specified cuenta_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cuentaGrupo = $this->cuentaGrupoRepository->findWithoutFail($id);

        if (empty($cuentaGrupo)) {
            Flash::error('Grupo no encontrado');

            return redirect(route('cuentaGrupos.index'));
        }
		/*
		//return view('greetings', ['name' => 'Victoria']);
		*/
		//se lista el nombre y el id correspondiente a todos las cuenta_clase
		$cuentaClase = cuenta_clase::lists('nombre', 'cntc_id');
        return view('cuentaGrupos.edit', ['cuentaGrupo' => $cuentaGrupo, 'cuentaClase' => $cuentaClase]);
		
        //return view('cuentaGrupos.edit')->with('cuentaGrupo', $cuentaGrupo);
    }

    /**
     * Update the specified cuenta_grupo in storage.
     *
     * @param  int              $id
     * @param Updatecuenta_grupoRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecuenta_grupoRequest $request)
    {
        $cuentaGrupo = $this->cuentaGrupoRepository->findWithoutFail($id);

        if (empty($cuentaGrupo)) {
            Flash::error('cuenta_grupo not found');

            return redirect(route('cuentaGrupos.index'));
        }

        $cuentaGrupo = $this->cuentaGrupoRepository->update($request->all(), $id);

        Flash::success('cuenta_grupo updated successfully.');

        return redirect(route('cuentaGrupos.index'));
    }

    /**
     * Remove the specified cuenta_grupo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cuentaGrupo = $this->cuentaGrupoRepository->findWithoutFail($id);

        if (empty($cuentaGrupo)) {
            Flash::error('cuenta_grupo not found');

            return redirect(route('cuentaGrupos.index'));
        }

        $this->cuentaGrupoRepository->delete($id);

        Flash::success('cuenta_grupo deleted successfully.');

        return redirect(route('cuentaGrupos.index'));
    }
}
