<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\cuenta;

class UpdatecuentaRequest extends Request
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
			'cnt_id' => 'required|min:1000|max:9999|integer',
			'nombre' => 'required|max:255',
			'ajuste' => 'required|max:10',
			'cnt_cntgid' => 'required|max:2',
        ];
    }
}
