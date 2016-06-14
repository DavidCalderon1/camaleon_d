<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createpuc_cuentaauxiliarRequest;
use App\Http\Requests\Updatepuc_cuentaauxiliarRequest;
use App\Repositories\puc_cuentaauxiliarRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class puc_cuentaauxiliarController extends AppBaseController
{
    /** @var  puc_cuentaauxiliarRepository */
    private $pucCuentaauxiliarRepository;

    public function __construct(puc_cuentaauxiliarRepository $pucCuentaauxiliarRepo)
    {
        $this->pucCuentaauxiliarRepository = $pucCuentaauxiliarRepo;
    }

    /**
     * Display a listing of the puc_cuentaauxiliar.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucCuentaauxiliarRepository->pushCriteria(new RequestCriteria($request));
        $pucCuentaauxiliars = $this->pucCuentaauxiliarRepository->all();

        return view('pucCuentaauxiliars.index')
            ->with('pucCuentaauxiliars', $pucCuentaauxiliars);
    }

    /**
     * Show the form for creating a new puc_cuentaauxiliar.
     *
     * @return Response
     */
    public function create()
    {
        return view('pucCuentaauxiliars.create');
    }

    /**
     * Store a newly created puc_cuentaauxiliar in storage.
     *
     * @param Createpuc_cuentaauxiliarRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_cuentaauxiliarRequest $request)
    {
        $input = $request->all();

        $pucCuentaauxiliar = $this->pucCuentaauxiliarRepository->create($input);

        Flash::success('puc_cuentaauxiliar saved successfully.');

        return redirect(route('pucCuentaauxiliars.index'));
    }

    /**
     * Display the specified puc_cuentaauxiliar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pucCuentaauxiliar = $this->pucCuentaauxiliarRepository->findWithoutFail($id);

        if (empty($pucCuentaauxiliar)) {
            Flash::error('puc_cuentaauxiliar not found');

            return redirect(route('pucCuentaauxiliars.index'));
        }

        return view('pucCuentaauxiliars.show')->with('pucCuentaauxiliar', $pucCuentaauxiliar);
    }

    /**
     * Show the form for editing the specified puc_cuentaauxiliar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pucCuentaauxiliar = $this->pucCuentaauxiliarRepository->findWithoutFail($id);

        if (empty($pucCuentaauxiliar)) {
            Flash::error('puc_cuentaauxiliar not found');

            return redirect(route('pucCuentaauxiliars.index'));
        }

        return view('pucCuentaauxiliars.edit')->with('pucCuentaauxiliar', $pucCuentaauxiliar);
    }

    /**
     * Update the specified puc_cuentaauxiliar in storage.
     *
     * @param  int              $id
     * @param Updatepuc_cuentaauxiliarRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_cuentaauxiliarRequest $request)
    {
        $pucCuentaauxiliar = $this->pucCuentaauxiliarRepository->findWithoutFail($id);

        if (empty($pucCuentaauxiliar)) {
            Flash::error('puc_cuentaauxiliar not found');

            return redirect(route('pucCuentaauxiliars.index'));
        }

        $pucCuentaauxiliar = $this->pucCuentaauxiliarRepository->update($request->all(), $id);

        Flash::success('puc_cuentaauxiliar updated successfully.');

        return redirect(route('pucCuentaauxiliars.index'));
    }

    /**
     * Remove the specified puc_cuentaauxiliar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pucCuentaauxiliar = $this->pucCuentaauxiliarRepository->findWithoutFail($id);

        if (empty($pucCuentaauxiliar)) {
            Flash::error('puc_cuentaauxiliar not found');

            return redirect(route('pucCuentaauxiliars.index'));
        }

        $this->pucCuentaauxiliarRepository->delete($id);

        Flash::success('puc_cuentaauxiliar deleted successfully.');

        return redirect(route('pucCuentaauxiliars.index'));
    }
}
