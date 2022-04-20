<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Không được bỏ trống email',
            'password_confirmation.required' => 'Không được bỏ trống xác nhận password',
            'email.email' => 'Bắt buộc phải là email',
            'email.exists' => 'Vui lòng kiểm tra lại email',
            'password.required' => "Không được bỏ trống mật khẩu",
            'password.confirm' => "Mật khẩu xác nhận không trùng khớp",

        ];
    }
}
