<?php

namespace App\Models\Admin\Puc;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="puc_grupo",
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
 *          property="nativa",
 *          description="nativa",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="clase_id",
 *          description="clase_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class puc_grupo extends Model
{
    //use SoftDeletes;

    public $table = 'puc_grupo';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'clase_id',
        'codigo',
        'nombre',
        'descripcion',
        'ajuste',
        'nativa',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'clase_id' => 'integer',
        'codigo' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'nativa' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'clase_id' => 'required|integer',
        'codigo' => 'required|unique:puc_grupo|min:10|max:99|integer',
        'nombre' => 'required|max:255',
        'descripcion' => 'required',
        'ajuste' => 'required|max:10',
        'nativa' => 'required|boolean',
    ];
}
