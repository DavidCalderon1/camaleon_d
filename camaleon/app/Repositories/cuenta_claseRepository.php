<?php

namespace App\Repositories;

use App\Models\cuenta_clase;
use InfyOm\Generator\Common\BaseRepository;

class cuenta_claseRepository extends BaseRepository
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
        return cuenta_clase::class;
    }
}
