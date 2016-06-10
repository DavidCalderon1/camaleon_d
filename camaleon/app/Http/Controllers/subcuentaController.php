<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatesubcuentaRequest;
use App\Http\Requests\UpdatesubcuentaRequest;
use App\Repositories\subcuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class subcuentaController extends AppBaseController
{
    /** @var  subcuentaRepository */
    private $subcuentaRepository;

    public function __construct(subcuentaRepository $subcuentaRepo)
    {
        $this->subcuentaRepository = $subcuentaRepo;
    }

    /**
     * Display a listing of the subcuenta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subcuentaRepository->pushCriteria(new RequestCriteria($request));
        $subcuentas = $this->subcuentaRepository->paginate(5);

        return view('subcuentas.index')
            ->with('subcuentas', $subcuentas);
    }

    /**
     * Show the form for creating a new subcuenta.
     *
     * @return Response
     */
    public function create()
    {
        return view('subcuentas.create');
    }

    /**
     * Store a newly created subcuenta in storage.
     *
     * @param CreatesubcuentaRequest $request
     *
     * @return Response
     */
    public function store(CreatesubcuentaRequest $request)
    {
        $input = $request->all();

        $subcuenta = $this->subcuentaRepository->create($input);

        Flash::success('subcuenta saved successfully.');

        return redirect(route('subcuentas.index'));
    }

    /**
     * Display the specified subcuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subcuenta = $this->subcuentaRepository->findWithoutFail($id);

        if (empty($subcuenta)) {
            Flash::error('subcuenta not found');

            return redirect(route('subcuentas.index'));
        }

        return view('subcuentas.show')->with('subcuenta', $subcuenta);
    }

    /**
     * Show the form for editing the specified subcuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subcuenta = $this->subcuentaRepository->findWithoutFail($id);

        if (empty($subcuenta)) {
            Flash::error('subcuenta not found');

            return redirect(route('subcuentas.index'));
        }

        return view('subcuentas.edit')->with('subcuenta', $subcuenta);
    }

    /**
     * Update the specified subcuenta in storage.
     *
     * @param  int              $id
     * @param UpdatesubcuentaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubcuentaRequest $request)
    {
        $subcuenta = $this->subcuentaRepository->findWithoutFail($id);

        if (empty($subcuenta)) {
            Flash::error('subcuenta not found');

            return redirect(route('subcuentas.index'));
        }

        $subcuenta = $this->subcuentaRepository->update($request->all(), $id);

        Flash::success('subcuenta updated successfully.');

        return redirect(route('subcuentas.index'));
    }

    /**
     * Remove the specified subcuenta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subcuenta = $this->subcuentaRepository->findWithoutFail($id);

        if (empty($subcuenta)) {
            Flash::error('subcuenta not found');

            return redirect(route('subcuentas.index'));
        }

        $this->subcuentaRepository->delete($id);

        Flash::success('subcuenta deleted successfully.');

        return redirect(route('subcuentas.index'));
    }
}
