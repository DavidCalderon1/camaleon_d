<?php

namespace App\Repositories;

use App\Models\puc_cuentaauxiliar;
use InfyOm\Generator\Common\BaseRepository;

class puc_cuentaauxiliarRepository extends BaseRepository
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
        return puc_cuentaauxiliar::class;
    }
}
