<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="subcuenta",
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
 *          property="scnt_nativa",
 *          description="scnt_nativa",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="scnt_cntid",
 *          description="scnt_cntid",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="scnt_id",
 *          description="scnt_id",
 *          type="string"
 *      )
 * )
 */
class subcuenta extends Model
{
    use SoftDeletes;

    public $table = 'subcuenta';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'scnt_id';

    public $fillable = [
        'nombre',
        'descripcion',
        'ajuste',
        'scnt_nativa',
        'scnt_cntid'
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
        'scnt_nativa' => 'boolean',
        'scnt_cntid' => 'string',
        'scnt_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
		'nombre' => 'required',
        'ajuste' => 'required',
        'scnt_cntid' => 'required',
        'scnt_id' => 'required|unique:subcuenta'
    ];
}
