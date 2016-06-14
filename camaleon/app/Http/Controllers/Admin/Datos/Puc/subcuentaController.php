<?php

namespace App\Http\Controllers\Admin\Datos\Puc;

use App\Http\Requests;
use App\Http\Requests\CreatesubcuentaRequest;
use App\Http\Requests\UpdatesubcuentaRequest;
use App\Repositories\subcuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\cuenta;

class subcuentaController extends \App\Http\Controllers\AppBaseController
{
    /** @var  subcuentaRepository */
    private $subcuentaRepository;
    private $cuenta;

    public function __construct(subcuentaRepository $subcuentaRepo)
    {
        $this->subcuentaRepository = $subcuentaRepo;
		 //se lista el nombre y el id correspondiente a todas las cuentas
		$this->cuenta =  cuenta::lists('nombre', 'cnt_id');
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
        return view('subcuentas.create')->with('cuenta', $this->cuenta);
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

        Flash::success('Subcuenta guardada correctamente.');

        return redirect(route('admin.datos.puc.subcuentas.index'));
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
            Flash::error('Subcuenta no encontrada');

            return redirect(route('admin.datos.puc.subcuentas.index'));
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
            Flash::error('Subcuenta no encontrada');

            return redirect(route('admin.datos.puc.subcuentas.index'));
        }

        return view('subcuentas.edit', ['subcuenta' => $subcuenta, 'cuenta' => $this->cuenta]);
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
		//consulta si existe un registro con el scnt_id enviado
		$consultaId = $this->subcuentaRepository->findWithoutFail($request->scnt_id);

        if (empty($subcuenta)) {
            Flash::error('Subcuenta no encontrada');

            return redirect(route('subcuentas.index'));
        }

	//valida que no exista un registro con el mismo scnt_id
	if( count($consultaId) > 0 && $id !== $request->scnt_id ){
		Flash::error('Ya existe una Subcuenta con ese Id');
		//regresa al formulario de actualizacion del recurso
    		return redirect(route( 'admin.datos.puc.subcuentas.edit',['id' => $id] ));
	}
        $subcuenta = $this->subcuentaRepository->update($request->all(), $id);

        Flash::success('Subcuenta actualizada correctamente.');

        return redirect(route('admin.datos.puc.subcuentas.index'));
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
            Flash::error('Subcuenta no encontrada');

            return redirect(route('admin.datos.puc.subcuentas.index'));
        }

        $this->subcuentaRepository->delete($id);

        Flash::success('Subcuenta eliminada correctamente.');

        return redirect(route('admin.datos.puc.subcuentas.index'));
    }
}
