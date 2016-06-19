<?php

namespace App\Repositories\Admin\Puc;

use App\Models\Admin\Puc\puc_cuenta;
use InfyOm\Generator\Common\BaseRepository;

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
}
