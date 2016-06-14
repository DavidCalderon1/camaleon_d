<?php

namespace App\Repositories;

use App\Models\puc_subcuenta;
use InfyOm\Generator\Common\BaseRepository;

class puc_subcuentaRepository extends BaseRepository
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
        return puc_subcuenta::class;
    }
}
