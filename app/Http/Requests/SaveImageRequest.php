<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveImageRequest extends Request
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

        $rules = [
            'big_name' => 'required',
            'keem_line' => 'required',
            'husband_line' => 'required',
            'kemler_line' => 'required',
            'kaplan_line' => 'required',
        ];
        return $rules;
    }
}
