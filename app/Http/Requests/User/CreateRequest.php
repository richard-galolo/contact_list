<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'image'         => 'nullable|mimes:jpeg,jpg,png|max:10000',
            'first_name'    => 'required|regex:/^[a-zA-Z\s]*$/',
            'last_name'     => 'required|regex:/^[a-zA-Z\s]*$/',
            'email'         => 'required|unique:users',
            'contact_number'=> 'required|unique:users',
            'password'      => 'nullable',
        ];
    }
}
