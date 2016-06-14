<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\cuenta_clase;

class Updatecuenta_claseRequest extends Request
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
			'cntc_id' => 'required|min:1|max:9|integer',
            'nombre' => 'required|max:255',
			'ajuste' => 'required|max:10',
			'cntc_naturaleza' => 'max:10',
        ];
    }
}
