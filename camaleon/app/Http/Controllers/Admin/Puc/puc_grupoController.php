<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_grupoRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_grupoRequest;
use App\Repositories\Admin\Puc\puc_grupoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Admin\Puc\puc_clase;

class puc_grupoController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_grupoRepository */
    private $pucGrupoRepository;
    private $pucClase;

    public function __construct(puc_grupoRepository $pucGrupoRepo)
    {
        $this->pucGrupoRepository = $pucGrupoRepo;
        //se lista el nombre y el id correspondiente a todas las puc_clase
		$this->pucClase =  puc_clase::lists('nombre', 'id');
    }

    /**
     * Display a listing of the puc_grupo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucGrupoRepository->pushCriteria(new RequestCriteria($request));
        $pucGrupos = $this->pucGrupoRepository->orderBy('codigo', 'asc')->paginate(15);

        return view('admin.puc.pucGrupos.index')
            ->with('pucGrupos', $pucGrupos);
    }

    /**
     * Show the form for creating a new puc_grupo.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.puc.pucGrupos.create')->with('pucClase', $this->pucClase);
    }

    /**
     * Store a newly created puc_grupo in storage.
     *
     * @param Createpuc_grupoRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_grupoRequest $request)
    {
        $input = $request->all();

        $pucGrupo = $this->pucGrupoRepository->create($input);

        Flash::success('Grupo guardado correctamente.');

        //return redirect(route('admin.puc.grupos.index'));
		return redirect(route('admin.puc.grupos.show',$pucGrupo->id) );
    }

    /**
     * Display the specified puc_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pucGrupo = $this->pucGrupoRepository->findWithoutFail($id);

        if (empty($pucGrupo)) {
            Flash::error('Grupo no encontrado');

            return redirect(route('admin.puc.grupos.index'));
        }

        return view('admin.puc.pucGrupos.show')->with('pucGrupo', $pucGrupo);
    }

    /**
     * Show the form for editing the specified puc_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pucGrupo = $this->pucGrupoRepository->findWithoutFail($id);

        if (empty($pucGrupo)) {
            Flash::error('Grupo no encontrado');

            return redirect(route('admin.puc.grupos.index'));
        }

        return view('admin.puc.pucGrupos.edit',['pucGrupo' => $pucGrupo, 'pucClase' => $this->pucClase]);
    }

    /**
     * Update the specified puc_grupo in storage.
     *
     * @param  int              $id
     * @param Updatepuc_grupoRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_grupoRequest $request)
    {
        $pucGrupo = $this->pucGrupoRepository->findWithoutFail($id);
		//consulta si existe un registro con el codigo enviado
		$consultaId = $this->pucGrupoRepository->findWithoutFail($request->codigo);

        if (empty($pucGrupo)) {
            Flash::error('Grupo no encontrado');
            return redirect(route('admin.puc.grupos.index'));
        }
		//valida que no exista un registro con el mismo codigo
		if( count($consultaId) > 0 && $pucGrupo->codigo !== $request->codigo ){
			Flash::error('Ya existe un Grupo con ese Código');
				
			//regresa al formulario de actualizacion del recurso
			return redirect(route( 'admin.puc.grupos.edit',['id' => $id] ));
				
		}

        $pucGrupo = $this->pucGrupoRepository->update($request->all(), $id);

        Flash::success('Grupo actualizado correctamente.');

        //return redirect(route('admin.puc.grupos.index'));
		return redirect(route('admin.puc.grupos.show',$pucGrupo->id) );
    }

    /**
     * Remove the specified puc_grupo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pucGrupo = $this->pucGrupoRepository->findWithoutFail($id);

        if (empty($pucGrupo)) {
            Flash::error('Grupo no encontrado');

            return redirect(route('admin.puc.grupos.index'));
        }

        $this->pucGrupoRepository->delete($id);

        Flash::success('Grupo eliminado correctamente.');

        return redirect(route('admin.puc.grupos.index'));
    }
}
