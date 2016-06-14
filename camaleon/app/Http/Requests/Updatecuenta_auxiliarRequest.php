<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\cuenta_auxiliar;

class Updatecuenta_auxiliarRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'cntaux_id' => 'required|min:1000000000000000|max:9999999999999999|integer',
			'nombre' => 'required|max:255',
			'ajuste' => 'required|max:10',
			'cntaux_scntid' => 'required|max:6',
			'reqta' => 'boolean',
			'estado' => 'boolean',
        ];
    }
}
