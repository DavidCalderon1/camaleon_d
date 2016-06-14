<?php

namespace App\Repositories;

use App\Models\puc_grupo;
use InfyOm\Generator\Common\BaseRepository;

class puc_grupoRepository extends BaseRepository
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
        return puc_grupo::class;
    }
}
