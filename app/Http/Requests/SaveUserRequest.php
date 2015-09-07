<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveUserRequest extends Request
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
            'email' => 'required',
            'password' => 'required',
            'person_id' => 'required',
            'keem_access' => 'required',
            'husband_access' => 'required',
            'kemler_access' => 'required',
            'kaplan_access' => 'required',
        ];
        return $rules;
    }
}
