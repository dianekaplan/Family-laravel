<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveNoteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //@TODO: come back and make permission levels: everyone can update themselves, some can update those in their branch
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'body' => 'required',

        ];

        return $rules;
    }
}
