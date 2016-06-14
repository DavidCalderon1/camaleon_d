<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\subcuenta;

class UpdatesubcuentaRequest extends Request
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
			'scnt_id' => 'required|min:100000|max:999999|integer',
			'nombre' => 'required|max:255',
			'ajuste' => 'required|max:10',
			'scnt_nativa' => 'required|boolean',
			'scnt_cntid' => 'required|max:4',
        ];
    }
}
