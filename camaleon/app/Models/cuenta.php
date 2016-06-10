<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="cuenta",
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
 *          property="cnt_cntgid",
 *          description="cnt_cntgid",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cnt_id",
 *          description="cnt_id",
 *          type="string"
 *      )
 * )
 */
class cuenta extends Model
{
    use SoftDeletes;

    public $table = 'cuenta';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'cnt_id';

    public $fillable = [
        'nombre',
        'descripcion',
        'ajuste',
        'cnt_cntgid'
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
        'cnt_cntgid' => 'string',
        'cnt_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'ajuste' => 'required',
        'cnt_cntgid' => 'required',
        'cnt_id' => 'required|unique:cuenta'
    ];
}
