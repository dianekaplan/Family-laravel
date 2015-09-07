<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SavePersonRequest extends Request
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
//TODO: come back and make permission levels: everyone can update themselves, some can update those in their branch
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first' => 'required',
            'last' => 'required',
            'keem_bool' => 'required',
            'husband_bool' => 'required',
            'kemler_bool' => 'required',
            'kaplan_bool' => 'required',
        ];

        //note for later: if you want different rules in different cases, add like so:
        //if (4condition) {
//        $rules['something_else'] = 'required';
//    }

        return $rules;
    }
}
