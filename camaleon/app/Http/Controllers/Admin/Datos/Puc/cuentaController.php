<?php

namespace App\Http\Controllers\Admin\Datos\Puc;

use App\Http\Requests;
use App\Http\Requests\CreatecuentaRequest;
use App\Http\Requests\UpdatecuentaRequest;
use App\Repositories\cuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\cuenta_grupo;

class cuentaController extends \App\Http\Controllers\AppBaseController
{
    /** @var  cuentaRepository */
    private $cuentaRepository;
	private $cuentaGrupo;

    public function __construct(cuentaRepository $cuentaRepo)
    {
        $this->cuentaRepository = $cuentaRepo;
        //se lista el nombre y el id correspondiente a todas las cuenta_grupo
		$this->cuentaGrupo =  cuenta_grupo::lists('nombre', 'cntg_id');
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
        return view('cuentas.create')->with('cuentaGrupo', $this->cuentaGrupo);
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

        Flash::success('Cuenta guardada correctamente.');

        return redirect(route('admin.datos.puc.cuentas.index'));
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
            Flash::error('Cuenta no encontrada');

            return redirect(route('admin.datos.puc.cuentas.index'));
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
            Flash::error('Cuenta no encontrada');

            return redirect(route('admin.datos.puc.cuentas.index'));
        }
		return view('cuentas.edit', ['cuenta' => $cuenta, 'cuentaGrupo' => $this->cuentaGrupo] );
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
		//consulta si existe un registro con el cnt_id enviado
		$consultaId = $this->cuentaRepository->findWithoutFail($request->cnt_id);

        if (empty($cuenta)) {
            Flash::error('Cuenta no encontrada');

            return redirect(route('cuentas.index'));
        }
		
		//valida que no exista un registro con el mismo cnt_id
		if( count($consultaId) > 0 && $id !== $request->cnt_id ){
			Flash::error('Ya existe una Cuenta con ese Id');
			//regresa al formulario de actualizacion del recurso
            return redirect(route( 'admin.datos.puc.cuentas.edit',['id' => $id] ));
		}
		
        $cuenta = $this->cuentaRepository->update($request->all(), $id);

        Flash::success('Cuenta actualizada correctamente.');

        return redirect(route('admin.datos.puc.cuentas.index'));
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
            Flash::error('Cuenta no encontrada');

            return redirect(route('admin.datos.puc.cuentas.index'));
        }

        $this->cuentaRepository->delete($id);

        Flash::success('Cuenta eliminada correctamente.');

        return redirect(route('admin.datos.puc.cuentas.index'));
    }
	
}
