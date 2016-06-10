<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecuentaRequest;
use App\Http\Requests\UpdatecuentaRequest;
use App\Repositories\cuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class cuentaController extends AppBaseController
{
    /** @var  cuentaRepository */
    private $cuentaRepository;

    public function __construct(cuentaRepository $cuentaRepo)
    {
        $this->cuentaRepository = $cuentaRepo;
    }

    /**
     * Display a listing of the cuenta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cuentaRepository->pushCriteria(new RequestCriteria($request));
        $cuentas = $this->cuentaRepository->paginate(5);

        return view('cuentas.index')
            ->with('cuentas', $cuentas);
    }

    /**
     * Show the form for creating a new cuenta.
     *
     * @return Response
     */
    public function create()
    {
        return view('cuentas.create');
    }

    /**
     * Store a newly created cuenta in storage.
     *
     * @param CreatecuentaRequest $request
     *
     * @return Response
     */
    public function store(CreatecuentaRequest $request)
    {
        $input = $request->all();

        $cuenta = $this->cuentaRepository->create($input);

        Flash::success('cuenta saved successfully.');

        return redirect(route('cuentas.index'));
    }

    /**
     * Display the specified cuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cuenta = $this->cuentaRepository->findWithoutFail($id);

        if (empty($cuenta)) {
            Flash::error('cuenta not found');

            return redirect(route('cuentas.index'));
        }

        return view('cuentas.show')->with('cuenta', $cuenta);
    }

    /**
     * Show the form for editing the specified cuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cuenta = $this->cuentaRepository->findWithoutFail($id);

        if (empty($cuenta)) {
            Flash::error('cuenta not found');

            return redirect(route('cuentas.index'));
        }

        return view('cuentas.edit')->with('cuenta', $cuenta);
    }

    /**
     * Update the specified cuenta in storage.
     *
     * @param  int              $id
     * @param UpdatecuentaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecuentaRequest $request)
    {
        $cuenta = $this->cuentaRepository->findWithoutFail($id);

        if (empty($cuenta)) {
            Flash::error('cuenta not found');

            return redirect(route('cuentas.index'));
        }

        $cuenta = $this->cuentaRepository->update($request->all(), $id);

        Flash::success('cuenta updated successfully.');

        return redirect(route('cuentas.index'));
    }

    /**
     * Remove the specified cuenta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cuenta = $this->cuentaRepository->findWithoutFail($id);

        if (empty($cuenta)) {
            Flash::error('cuenta not found');

            return redirect(route('cuentas.index'));
        }

        $this->cuentaRepository->delete($id);

        Flash::success('cuenta deleted successfully.');

        return redirect(route('cuentas.index'));
    }
}
