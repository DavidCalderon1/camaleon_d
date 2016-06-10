<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createcuenta_auxiliarRequest;
use App\Http\Requests\Updatecuenta_auxiliarRequest;
use App\Repositories\cuenta_auxiliarRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class cuenta_auxiliarController extends AppBaseController
{
    /** @var  cuenta_auxiliarRepository */
    private $cuentaAuxiliarRepository;

    public function __construct(cuenta_auxiliarRepository $cuentaAuxiliarRepo)
    {
        $this->cuentaAuxiliarRepository = $cuentaAuxiliarRepo;
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
        return view('cuentaAuxiliars.create');
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

        Flash::success('cuenta_auxiliar saved successfully.');

        return redirect(route('cuentaAuxiliars.index'));
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
            Flash::error('cuenta_auxiliar not found');

            return redirect(route('cuentaAuxiliars.index'));
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
            Flash::error('cuenta_auxiliar not found');

            return redirect(route('cuentaAuxiliars.index'));
        }

        return view('cuentaAuxiliars.edit')->with('cuentaAuxiliar', $cuentaAuxiliar);
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

        if (empty($cuentaAuxiliar)) {
            Flash::error('cuenta_auxiliar not found');

            return redirect(route('cuentaAuxiliars.index'));
        }

        $cuentaAuxiliar = $this->cuentaAuxiliarRepository->update($request->all(), $id);

        Flash::success('cuenta_auxiliar updated successfully.');

        return redirect(route('cuentaAuxiliars.index'));
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
            Flash::error('cuenta_auxiliar not found');

            return redirect(route('cuentaAuxiliars.index'));
        }

        $this->cuentaAuxiliarRepository->delete($id);

        Flash::success('cuenta_auxiliar deleted successfully.');

        return redirect(route('cuentaAuxiliars.index'));
    }
}
