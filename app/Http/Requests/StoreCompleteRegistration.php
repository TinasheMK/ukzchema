<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompleteRegistration extends FormRequest
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
            'password' => "required|min:6|regex:/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/|confirmed",

            'token' => "required"
        ];
    }

    public function messages()
    {
        return [
            'token.required' => 'Oops! something isn\'t right. Refresh your browser',
        ];
    }
}
