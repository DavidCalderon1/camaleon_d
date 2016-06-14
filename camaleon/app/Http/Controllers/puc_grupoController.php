<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createpuc_grupoRequest;
use App\Http\Requests\Updatepuc_grupoRequest;
use App\Repositories\puc_grupoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class puc_grupoController extends AppBaseController
{
    /** @var  puc_grupoRepository */
    private $pucGrupoRepository;

    public function __construct(puc_grupoRepository $pucGrupoRepo)
    {
        $this->pucGrupoRepository = $pucGrupoRepo;
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
        $pucGrupos = $this->pucGrupoRepository->all();

        return view('pucGrupos.index')
            ->with('pucGrupos', $pucGrupos);
    }

    /**
     * Show the form for creating a new puc_grupo.
     *
     * @return Response
     */
    public function create()
    {
        return view('pucGrupos.create');
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

        Flash::success('puc_grupo saved successfully.');

        return redirect(route('pucGrupos.index'));
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
            Flash::error('puc_grupo not found');

            return redirect(route('pucGrupos.index'));
        }

        return view('pucGrupos.show')->with('pucGrupo', $pucGrupo);
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
            Flash::error('puc_grupo not found');

            return redirect(route('pucGrupos.index'));
        }

        return view('pucGrupos.edit')->with('pucGrupo', $pucGrupo);
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

        if (empty($pucGrupo)) {
            Flash::error('puc_grupo not found');

            return redirect(route('pucGrupos.index'));
        }

        $pucGrupo = $this->pucGrupoRepository->update($request->all(), $id);

        Flash::success('puc_grupo updated successfully.');

        return redirect(route('pucGrupos.index'));
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
            Flash::error('puc_grupo not found');

            return redirect(route('pucGrupos.index'));
        }

        $this->pucGrupoRepository->delete($id);

        Flash::success('puc_grupo deleted successfully.');

        return redirect(route('pucGrupos.index'));
    }
}
