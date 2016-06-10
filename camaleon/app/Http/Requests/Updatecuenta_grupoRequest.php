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
            'nombre' => 'required|max:10',
			'ajuste' => 'required|max:10',
			'cntg_cntcid' => 'required|max:1',
			'cntg_id' => 'required|max:2',
        ];
    }
}
