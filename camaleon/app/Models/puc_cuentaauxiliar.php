<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="puc_cuentaauxiliar",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="codigo",
 *          description="codigo",
 *          type="string"
 *      ),
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
 *          property="tercero_activo",
 *          description="tercero_activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="estado",
 *          description="estado",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="subcuenta_id",
 *          description="subcuenta_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class puc_cuentaauxiliar extends Model
{
    use SoftDeletes;

    public $table = 'puc_cuentaauxiliar';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'ajuste',
        'tercero_activo',
        'estado',
        'subcuenta_id',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'tercero_activo' => 'boolean',
        'estado' => 'boolean',
        'subcuenta_id' => 'integer',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
