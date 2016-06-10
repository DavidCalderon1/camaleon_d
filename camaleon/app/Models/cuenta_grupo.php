<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="cuenta_grupo",
 *      required={},
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ajuste",
 *          description="ajuste",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cntg_cntcid",
 *          description="cntg_cntcid",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cntg_id",
 *          description="cntg_id",
 *          type="string"
 *      )
 * )
 */
class cuenta_grupo extends Model
{
    use SoftDeletes;

    public $table = 'cuenta_grupo';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'cntg_id';

    public $fillable = [
        'nombre',
        'descripcion',
        'ajuste',
        'cntg_cntcid',
        'cntg_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'cntg_cntcid' => 'string',
        'cntg_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|max:10',
        'ajuste' => 'required|max:10',
        'cntg_cntcid' => 'required|max:1',
        'cntg_id' => 'required|unique:cuenta_grupo|max:2'
    ];
}
