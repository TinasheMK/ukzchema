<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends FormRequest
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
            'old_password' => "required|password_check",
            'new_password' => "required|min:6|regex:/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/|confirmed",
        ];
    }

    public function messages()
    {
        return [
            'old_password.password_check' => 'Old Password Incorrect',
            'new_password.password_check' => 'You cannot use username as password',
        ];
    }
}
