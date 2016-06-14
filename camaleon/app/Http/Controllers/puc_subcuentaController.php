<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createpuc_subcuentaRequest;
use App\Http\Requests\Updatepuc_subcuentaRequest;
use App\Repositories\puc_subcuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class puc_subcuentaController extends AppBaseController
{
    /** @var  puc_subcuentaRepository */
    private $pucSubcuentaRepository;

    public function __construct(puc_subcuentaRepository $pucSubcuentaRepo)
    {
        $this->pucSubcuentaRepository = $pucSubcuentaRepo;
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
        $pucSubcuentas = $this->pucSubcuentaRepository->all();

        return view('pucSubcuentas.index')
            ->with('pucSubcuentas', $pucSubcuentas);
    }

    /**
     * Show the form for creating a new puc_subcuenta.
     *
     * @return Response
     */
    public function create()
    {
        return view('pucSubcuentas.create');
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

        Flash::success('puc_subcuenta saved successfully.');

        return redirect(route('pucSubcuentas.index'));
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
            Flash::error('puc_subcuenta not found');

            return redirect(route('pucSubcuentas.index'));
        }

        return view('pucSubcuentas.show')->with('pucSubcuenta', $pucSubcuenta);
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
            Flash::error('puc_subcuenta not found');

            return redirect(route('pucSubcuentas.index'));
        }

        return view('pucSubcuentas.edit')->with('pucSubcuenta', $pucSubcuenta);
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

        if (empty($pucSubcuenta)) {
            Flash::error('puc_subcuenta not found');

            return redirect(route('pucSubcuentas.index'));
        }

        $pucSubcuenta = $this->pucSubcuentaRepository->update($request->all(), $id);

        Flash::success('puc_subcuenta updated successfully.');

        return redirect(route('pucSubcuentas.index'));
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
            Flash::error('puc_subcuenta not found');

            return redirect(route('pucSubcuentas.index'));
        }

        $this->pucSubcuentaRepository->delete($id);

        Flash::success('puc_subcuenta deleted successfully.');

        return redirect(route('pucSubcuentas.index'));
    }
}
