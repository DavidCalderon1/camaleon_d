<?php

namespace App\Repositories\Admin\Puc;

use App\Models\Admin\Puc\puc_cuenta;
use InfyOm\Generator\Common\BaseRepository;
use DB;

class puc_cuentaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return puc_cuenta::class;
    }

    /**
     * @param $busqueda
     * @return mixed
     */
    public function busqueda($busqueda)
    {
        return $this->model->where('codigo', 'like', '%'.strtoupper($busqueda).'%')->orWhere(DB::raw("deleted_at is null and upper(nombre) like '%".strtoupper($busqueda)."%' and null"));
    }

    /**
     * @param $busqueda
     * @return mixed
     */
    public function listaid($busqueda)
    {
        return $this->model->where('grupo_id', '=', $busqueda);
    }
}
