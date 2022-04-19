<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Không được bỏ trống email',
            'email.email' => 'Bắt buộc phải là email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => "Không được bỏ trống mật khẩu",
            'password.confirmed' => "Mật khẩu không trùng khớp",
            'password_confirmation.required' => "Không được bỏ trống xác nhận mật khẩu",
        ];
    }
}
