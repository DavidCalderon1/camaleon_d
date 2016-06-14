<?php

namespace App\Http\Controllers\Admin\Datos\Puc;

use App\Http\Requests;
use App\Http\Requests\Createcuenta_grupoRequest;
use App\Http\Requests\Updatecuenta_grupoRequest;
use App\Repositories\cuenta_grupoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\cuenta_clase;

class cuenta_grupoController extends \App\Http\Controllers\AppBaseController
{
    /** @var  cuenta_grupoRepository */
    private $cuentaGrupoRepository;
    private $cuentaClase;

    public function __construct(cuenta_grupoRepository $cuentaGrupoRepo)
    {
        $this->cuentaGrupoRepository = $cuentaGrupoRepo;
        //se lista el nombre y el id correspondiente a todas las cuenta_clase
		$this->cuentaClase =  cuenta_clase::lists('nombre', 'cntc_id');
		
    }

    /**
     * Display a listing of the cuenta_grupo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cuentaGrupoRepository->pushCriteria(new RequestCriteria($request));
        $cuentaGrupos = $this->cuentaGrupoRepository->paginate(5);
		/*
		$game = Game::find(1)->platforms;
		
		RunUser::where('user_id',$id)->leftjoin('runs','runs.id','=','run_user.run_id')->first();
		
		DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.id', 'contacts.phone', 'orders.price')
            ->get();
			
		$articles = DB::table('articles')
            ->select('articles.id as articles_id', ..... )
            ->join('categories', 'articles.categories_id', '=', 'categories.id')
            ->join('users', 'articles.user_id', '=', 'user.id')
            ->get();
			
		-revizar eloquent para usarlo desde el modelo y hacer un llamado sencillo desde el controlador
		-al crear un recurso redireccionar a la vista del articulo creado
		*/
        return view('cuentaGrupos.index')
            ->with('cuentaGrupos', $cuentaGrupos);
    }

    /**
     * Show the form for creating a new cuenta_grupo.
     *
     * @return Response
     */
    public function create()
    {
        //se lista el nombre y el id correspondiente a todas las cuenta_clase
		//$cuentaClase = cuenta_clase::lists('nombre', 'cntc_id');
		//return view('cuentaGrupos.create',compact('cuentaClase') );
		return view('cuentaGrupos.create')->with('cuentaClase', $this->cuentaClase);
    }

    /**
     * Store a newly created cuenta_grupo in storage.
     *
     * @param Createcuenta_grupoRequest $request
     *
     * @return Response
     */
    public function store(Createcuenta_grupoRequest $request)
    {
        $input = $request->all();

        $cuentaGrupo = $this->cuentaGrupoRepository->create($input);

        Flash::success('Grupo guardado correctamente.');

        return redirect(route('admin.datos.puc.grupos.index'));
    }

    /**
     * Display the specified cuenta_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cuentaGrupo = $this->cuentaGrupoRepository->findWithoutFail($id);

        if (empty($cuentaGrupo)) {
            Flash::error('Grupo no encontrado');

            return redirect(route('admin.datos.puc.grupos.index'));
        }

        return view('cuentaGrupos.show')->with('cuentaGrupo', $cuentaGrupo);
    }

    /**
     * Show the form for editing the specified cuenta_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cuentaGrupo = $this->cuentaGrupoRepository->findWithoutFail($id);

        if (empty($cuentaGrupo)) {
            Flash::error('Grupo no encontrado');

            return redirect(route('admin.datos.puc.grupos.index'));
        }
		/*
		//return view('greetings', ['name' => 'Victoria']);
		*/
        return view('cuentaGrupos.edit', ['cuentaGrupo' => $cuentaGrupo, 'cuentaClase' => $this->cuentaClase]);
		
    }

    /**
     * Update the specified cuenta_grupo in storage.
     *
     * @param  int              $id
     * @param Updatecuenta_grupoRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecuenta_grupoRequest $request)
    {
        $cuentaGrupo = $this->cuentaGrupoRepository->findWithoutFail($id);
        //consulta si existe un registro con el cntg_id enviado
		$consultaId = $this->cuentaGrupoRepository->findWithoutFail($request->cntg_id);

        if (empty($cuentaGrupo)) {
            Flash::error('Grupo no encontrado');

            return redirect(route('admin.datos.puc.grupos.index'));
        }
		//valida que no exista un registro con el mismo cntg_id
		if( count($consultaId) > 0 && $id !== $request->cntg_id ){
			Flash::error('Ya existe un Grupo con ese Id');
			//Flash::error($id.' Ya existe un Grupo con ese Id'. count($cuentaGrupo) .' - '.$request->cntg_id .' - '.count($grupoNuevo)  );
			//url() .'/'. $request->path() .'/edit'
			
			//regresa al formulario de actualizacion del recurso
            return redirect(route( 'admin.datos.puc.grupos.edit',['id' => $id] ));
            //return redirect(route( 'admin.datos.puc.grupos.index'));
		}

        $cuentaGrupo = $this->cuentaGrupoRepository->update($request->all(), $id);

        Flash::success('Grupo actualizado correctamente.');

        return redirect(route('admin.datos.puc.grupos.index'));
    }

    /**
     * Remove the specified cuenta_grupo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cuentaGrupo = $this->cuentaGrupoRepository->findWithoutFail($id);

        if (empty($cuentaGrupo)) {
            Flash::error('Grupo no encontrado');

            return redirect(route('admin.datos.puc.grupos.index'));
        }

        $this->cuentaGrupoRepository->delete($id);

        Flash::success('Grupo eliminado correctamente.');

        return redirect(route('admin.datos.puc.grupos.index'));
    }
}
