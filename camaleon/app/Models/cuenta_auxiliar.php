<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="cuenta_auxiliar",
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
 *          property="reqta",
 *          description="reqta",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="estado",
 *          description="estado",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="cntaux_scntid",
 *          description="cntaux_scntid",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cntaux_id",
 *          description="cntaux_id",
 *          type="string"
 *      )
 * )
 */
class cuenta_auxiliar extends Model
{
    use SoftDeletes;

    public $table = 'cuenta_auxiliar';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'cntaux_id';

    public $fillable = [
        'cntaux_id',
        'nombre',
        'descripcion',
        'ajuste',
        'reqta',
        'estado',
        'cntaux_scntid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cntaux_id' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'reqta' => 'boolean',
        'estado' => 'boolean',
        'cntaux_scntid' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cntaux_id' => 'required|unique:cuenta_auxiliar|min:1000000000000000|max:9999999999999999|integer',
		'nombre' => 'required|max:255',
        'ajuste' => 'required|max:10',
        'cntaux_scntid' => 'required|max:6',
        'reqta' => 'boolean',
        'estado' => 'boolean',
    ];
}
