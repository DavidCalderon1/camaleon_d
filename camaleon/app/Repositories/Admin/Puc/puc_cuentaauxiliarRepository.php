<?php

namespace App\Repositories\Admin\Puc;

use App\Models\Admin\Puc\puc_cuentaauxiliar;
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
