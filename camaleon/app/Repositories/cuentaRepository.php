<?php

namespace App\Repositories;

use App\Models\cuenta;
use InfyOm\Generator\Common\BaseRepository;

class cuentaRepository extends BaseRepository
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
        return cuenta::class;
    }
}
