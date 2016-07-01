<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_claseRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_claseRequest;
use App\Repositories\Admin\Puc\puc_claseRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;

class puc_claseController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_claseRepository */
    private $pucClaseRepository;
    private $pucCuenta;
    private $peticion;

    public function __construct(puc_claseRepository $pucClaseRepo, Request $request)
    {
        $this->pucClaseRepository = $pucClaseRepo;
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['edit','show','update','destroy'] ]);
        $this->peticion = "normal";
        //va a mostrar la vista 'tables' en el caso de ser una peticion de tipo ajax
        if ($request->ajax() || $request->peticion == "ajax") {
            $this->peticion = "ajax";
        }
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function find(Route $route){
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'clases' el configurado en las rutas
        $this->pucCuenta = $this->pucClaseRepository->findWithoutFail( $route->getParameter('clases') );
    }

    /**
     * Display a listing of the puc_clase.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucClaseRepository->pushCriteria(new RequestCriteria($request));
        $pucCuentas = $this->pucClaseRepository;
        $vista = "admin.puc.pucCuentas.index";
        
        //si hay un request con el nombre busqueda se envia el parametro para realizar la busqueda
        if ( isset($request->busqueda) ) {
            $pucCuentas = $pucCuentas->busqueda($request->busqueda);
            
            /*
            //de esta manera se puede crear un query con scopes en el modelo
            $pucCuentas = $this->pucClaseRepository->scopeQuery(function($query){
                return $query->orderBy('codigo','asc');
            })->busqueda($request->busqueda)->paginate(15);
            */
        }
        //si hay un request con el nombre listaid se envia el parametro para realizar la busqueda de todos los registros que tengan la llave foranea con ese valor
        if ( isset($request->listaid) ) {
            $pucCuentas = $pucCuentas->listaid($request->listaid);
        }

        $pucCuentas = $pucCuentas->orderBy('codigo', 'asc')->paginate(15);

        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase', 'pucCuentas' => $pucCuentas]);
    }

    /**
     * Show the form for creating a new puc_clase.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.puc.pucCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase']);
    }

    /**
     * Store a newly created puc_clase in storage.
     *
     * @param Createpuc_claseRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_claseRequest $request)
    {
        $input = $request->all();

        $this->pucCuenta = $this->pucClaseRepository->create($input);

        Flash::success('Clase guardada correctamente.');

        return redirect(route('admin.puc.clases.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified puc_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.puc.clases.index'));
        }
        
        return view('admin.puc.pucCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase', 'pucCuenta' => $this->pucCuenta]);
    }

    /**
     * Show the form for editing the specified puc_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.puc.cuentas.index'));
        }

        return view('admin.puc.pucCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase', 'pucCuenta' => $this->pucCuenta]);
    }

    /**
     * Update the specified puc_clase in storage.
     *
     * @param  int              $id
     * @param Updatepuc_claseRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_claseRequest $request)
    {
        //consulta si existe un registro con el codigo enviado
        $consultaId = $this->pucClaseRepository->findWithoutFail($request->codigo);

        if (empty($this->pucCuenta)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.puc.clases.index'));
        }
        //valida que no exista un registro con el mismo codigo
        if( count($consultaId) > 0 && $this->pucCuenta->codigo !== $request->codigo ){
            Flash::error('Ya existe una Clase con ese Código');
            //regresa al formulario de actualizacion del recurso
            return redirect(route( 'admin.puc.clases.edit',['id' => $id] ));
        }

        $this->pucCuenta = $this->pucClaseRepository->update($request->all(), $id);

        Flash::success('Clase actualizada correctamente.');

        //return redirect(route('admin.puc.clases.index'));
        return redirect(route('admin.puc.clases.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Remove the specified puc_clase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Clase no encontrada');

            return redirect(route('admin.puc.clases.index'));
        }

        $this->pucClaseRepository->delete($id);

        Flash::success('Clase eliminada correctamente.');

        return redirect(route('admin.puc.clases.index'));
    }
}
