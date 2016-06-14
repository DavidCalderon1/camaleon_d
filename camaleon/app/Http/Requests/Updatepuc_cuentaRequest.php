<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\puc_cuenta;

class Updatepuc_cuentaRequest extends Request
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
        return puc_cuenta::$rules;
    }
}
