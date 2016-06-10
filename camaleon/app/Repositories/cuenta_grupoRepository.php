<?php

namespace App\Repositories;

use App\Models\cuenta_grupo;
use InfyOm\Generator\Common\BaseRepository;

class cuenta_grupoRepository extends BaseRepository
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
        return cuenta_grupo::class;
    }
}
