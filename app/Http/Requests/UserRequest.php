<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống',
            'gender.required' => 'Không để trống',
            'dob.required' => 'Không để trống',
            'address.required' => 'Vui lòng không để trống',
            
        ];
    }
}
