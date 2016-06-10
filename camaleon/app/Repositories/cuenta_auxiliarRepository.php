<?php

namespace App\Repositories;

use App\Models\cuenta_auxiliar;
use InfyOm\Generator\Common\BaseRepository;

class cuenta_auxiliarRepository extends BaseRepository
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
        return cuenta_auxiliar::class;
    }
}
