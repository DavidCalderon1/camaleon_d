<?php

namespace App\Repositories;

use App\Models\puc_cuenta;
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
