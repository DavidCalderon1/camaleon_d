<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createcuenta_claseRequest;
use App\Http\Requests\Updatecuenta_claseRequest;
use App\Repositories\cuenta_claseRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class cuenta_claseController extends AppBaseController
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

        Flash::success('cuenta_clase saved successfully.');

        return redirect(route('clases.index'));
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
            Flash::error('cuenta_clase not found');

            return redirect(route('clases.index'));
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
            Flash::error('cuenta_clase not found');

            return redirect(route('clases.index'));
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

        if (empty($cuentaClase)) {
            Flash::error('cuenta_clase not found');

            return redirect(route('clases.index'));
        }

        $cuentaClase = $this->cuentaClaseRepository->update($request->all(), $id);

        Flash::success('cuenta_clase updated successfully.');

        return redirect(route('clases.index'));
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
            Flash::error('cuenta_clase not found');

            return redirect(route('clases.index'));
        }

        $this->cuentaClaseRepository->delete($id);

        Flash::success('cuenta_clase deleted successfully.');

        return redirect(route('clases.index'));
    }
}
