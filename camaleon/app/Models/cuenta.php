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
        'cnt_id',
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
        'cnt_id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'cnt_cntgid' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cnt_id' => 'required|unique:cuenta|min:1000|max:9999|integer',
        'nombre' => 'required|max:255',
        'ajuste' => 'required|max:10',
        'cnt_cntgid' => 'required|max:2',
    ];
}
