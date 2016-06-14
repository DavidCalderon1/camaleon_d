<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="cuenta_clase",
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
 *          property="cntc_naturaleza",
 *          description="cntc_naturaleza",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cntc_id",
 *          description="cntc_id",
 *          type="string"
 *      )
 * )
 */
class cuenta_clase extends Model
{
    use SoftDeletes;

    public $table = 'cuenta_clase';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'cntc_id';

    public $fillable = [
        'cntc_id',
        'nombre',
        'descripcion',
        'ajuste',
        'cntc_naturaleza',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cntc_id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'cntc_naturaleza' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cntc_id' => 'required|unique:cuenta_clase|min:1|max:9|integer',
		'nombre' => 'required|max:255',
        'ajuste' => 'required|max:10',
		'cntc_naturaleza' => 'max:10',
    ];
}
