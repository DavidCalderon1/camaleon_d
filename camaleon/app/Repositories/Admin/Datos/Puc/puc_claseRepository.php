<?php

namespace App\Repositories\Admin\Datos\Puc;

use App\Models\Admin\Datos\Puc\puc_clase;
use InfyOm\Generator\Common\BaseRepository;

class puc_claseRepository extends BaseRepository
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
        return puc_clase::class;
    }
}
