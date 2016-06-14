<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\cuenta_grupo;

class Updatecuenta_grupoRequest extends Request
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
			'cntg_id' => 'required|min:10|max:99|integer',
            'nombre' => 'required|max:255',
			'ajuste' => 'required|max:10',
			'cntg_cntcid' => 'required|max:1',
        ];
    }
}
