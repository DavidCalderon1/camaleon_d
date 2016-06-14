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
        'scnt_id',
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
        'scnt_id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'scnt_nativa' => 'boolean',
        'scnt_cntid' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
		'scnt_id' => 'required|unique:subcuenta|min:100000|max:999999|integer',
		'nombre' => 'required|max:255',
		'ajuste' => 'required|max:10',
		'scnt_nativa' => 'required|boolean',
		'scnt_cntid' => 'required|max:4',
    ];
}
