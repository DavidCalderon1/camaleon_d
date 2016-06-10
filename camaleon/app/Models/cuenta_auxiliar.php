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
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'reqta' => 'boolean',
        'estado' => 'boolean',
        'cntaux_scntid' => 'string',
        'cntaux_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
		'nombre' => 'required',
        'ajuste' => 'required',
        'cntaux_scntid' => 'required',
        'cntaux_id' => 'required|unique:cuenta_auxiliar'
    ];
}
