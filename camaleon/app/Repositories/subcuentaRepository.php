<?php

namespace App\Repositories;

use App\Models\subcuenta;
use InfyOm\Generator\Common\BaseRepository;

class subcuentaRepository extends BaseRepository
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
        return subcuenta::class;
    }
}
