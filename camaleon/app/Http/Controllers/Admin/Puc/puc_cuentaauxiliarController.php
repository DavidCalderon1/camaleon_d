<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_cuentaauxiliarRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_cuentaauxiliarRequest;
use App\Repositories\Admin\Puc\puc_cuentaauxiliarRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Admin\Puc\puc_subcuenta;

class puc_cuentaauxiliarController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_cuentaauxiliarRepository */
    private $pucCuentaauxiliarRepository;
	private $pucSubcuenta;

    public function __construct(puc_cuentaauxiliarRepository $pucCuentaauxiliarRepo)
    {
        $this->pucCuentaauxiliarRepository = $pucCuentaauxiliarRepo;
		//se lista el nombre y el id correspondiente a todos los puc_grupo
		$this->pucSubcuenta =  puc_subcuenta::orderBy('id')->lists('nombre', 'id');
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
        $pucCuentaauxiliars = $this->pucCuentaauxiliarRepository->orderBy('codigo', 'asc')->paginate(15);

        return view('admin.puc.pucCuentaauxiliars.index')
            ->with('pucCuentaauxiliars', $pucCuentaauxiliars);
    }

    /**
     * Show the form for creating a new puc_cuentaauxiliar.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.puc.pucCuentaauxiliars.create')->with('pucSubcuenta', $this->pucSubcuenta);
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

        Flash::success('Cuenta Auxiliar guardada correctamente.');

        return redirect(route('admin.puc.cuentasauxiliares.show',$pucCuentaauxiliar->id) );
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
            Flash::error('Cuenta Auxiliar no encontrada');

            return redirect(route('admin.puc.cuentasauxiliares.index'));
        }

        return view('admin.puc.pucCuentaauxiliars.show')->with('pucCuentaauxiliar', $pucCuentaauxiliar);
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
            Flash::error('Cuenta Auxiliar no encontrada');

            return redirect(route('admin.puc.cuentasauxiliares.index'));
        }

        return view('admin.puc.pucCuentaauxiliars.edit', ['pucCuentaauxiliar' => $pucCuentaauxiliar, 'pucSubcuenta' => $this->pucSubcuenta]);
	
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
		//consulta si existe un registro con el codigo enviado
		$consultaId = $this->pucCuentaauxiliarRepository->findWithoutFail($request->codigo);

        if (empty($pucCuentaauxiliar)) {
            Flash::error('Cuenta Auxiliar no encontrada');

            return redirect(route('admin.puc.cuentasauxiliares.index'));
        }
		//valida que no exista un registro con el mismo codigo
		if( count($consultaId) > 0 && $pucCuentaauxiliar->codigo !== $request->codigo ){
			Flash::error('Ya existe una Cuenta auxiliar con ese Código');
				
			//regresa al formulario de actualizacion del recurso
			return redirect(route( 'admin.puc.cuentasauxiliares.edit',['id' => $id] ));
				
		}

        $pucCuentaauxiliar = $this->pucCuentaauxiliarRepository->update($request->all(), $id);

        Flash::success('Cuenta Auxiliar actualizada correctamente.');

        return redirect(route('admin.puc.cuentasauxiliares.show',$pucCuentaauxiliar->id) );
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
            Flash::error('Cuenta Auxiliar no encontrada');

            return redirect(route('admin.puc.cuentasauxiliares.index'));
        }

        $this->pucCuentaauxiliarRepository->delete($id);

        Flash::success('Cuenta Auxiliar eliminada correctamente.');

        return redirect(route('admin.puc.cuentasauxiliares.index'));
    }
}
