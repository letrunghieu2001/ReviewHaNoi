<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'address' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'time' => 'required',
            'link' => 'required',
            'map' => 'required',
            'title' => 'required',
            'content' => 'required',

        ];
    }

    public function messages()
    {
        return [


            'name.required' => 'Vui lòng không để trống',
            'address.required' => 'Vui lòng không để trống',
            'phone_number.required' => 'Vui lòng không để trống',
            'time.required' => 'Vui lòng không để trống',
            'link.required' => 'Vui lòng không để trống',
            'map.required' => 'Vui lòng không để trống',
            'title.required' => 'Vui lòng không để trống',
            'content.required' => 'Vui lòng không để trống',
            'phone_number.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            
        ];
    }
}
