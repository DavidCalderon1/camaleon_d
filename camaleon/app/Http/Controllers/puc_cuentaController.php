<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createpuc_cuentaRequest;
use App\Http\Requests\Updatepuc_cuentaRequest;
use App\Repositories\puc_cuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class puc_cuentaController extends AppBaseController
{
    /** @var  puc_cuentaRepository */
    private $pucCuentaRepository;

    public function __construct(puc_cuentaRepository $pucCuentaRepo)
    {
        $this->pucCuentaRepository = $pucCuentaRepo;
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
        $pucCuentas = $this->pucCuentaRepository->all();

        return view('pucCuentas.index')
            ->with('pucCuentas', $pucCuentas);
    }

    /**
     * Show the form for creating a new puc_cuenta.
     *
     * @return Response
     */
    public function create()
    {
        return view('pucCuentas.create');
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

        Flash::success('puc_cuenta saved successfully.');

        return redirect(route('pucCuentas.index'));
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
            Flash::error('puc_cuenta not found');

            return redirect(route('pucCuentas.index'));
        }

        return view('pucCuentas.show')->with('pucCuenta', $pucCuenta);
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
            Flash::error('puc_cuenta not found');

            return redirect(route('pucCuentas.index'));
        }

        return view('pucCuentas.edit')->with('pucCuenta', $pucCuenta);
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

        if (empty($pucCuenta)) {
            Flash::error('puc_cuenta not found');

            return redirect(route('pucCuentas.index'));
        }

        $pucCuenta = $this->pucCuentaRepository->update($request->all(), $id);

        Flash::success('puc_cuenta updated successfully.');

        return redirect(route('pucCuentas.index'));
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
            Flash::error('puc_cuenta not found');

            return redirect(route('pucCuentas.index'));
        }

        $this->pucCuentaRepository->delete($id);

        Flash::success('puc_cuenta deleted successfully.');

        return redirect(route('pucCuentas.index'));
    }
}
