<?php

namespace App\Http\Requests\Admin\Puc;

use App\Http\Requests\Request;
use App\Models\Admin\Puc\puc_grupo;

class Createpuc_grupoRequest extends Request
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
        return puc_grupo::$rules;
    }
}
