<?php

namespace App\Repositories\Admin\Puc;

use App\Models\Admin\Puc\puc_clase;
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
