<?php

namespace App\Repositories\Admin\Puc;

use App\Models\Admin\Puc\puc_subcuenta;
use InfyOm\Generator\Common\BaseRepository;

class puc_subcuentaRepository extends BaseRepository
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
        return puc_subcuenta::class;
    }
}
