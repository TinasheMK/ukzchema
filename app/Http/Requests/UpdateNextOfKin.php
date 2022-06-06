<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNextOfKin extends FormRequest
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
            "nok_city" => 'required',
            "nok_country" => 'required',
            "nok_dob" => 'required',
            "nok_email" => 'required|email|max:255',
            "nok_full_name" => 'required|max:255',
            "nok_phone" => 'required',
            "nok_street" => 'required',
            "nok_zip" => 'sometimes',
        ];
    }
}
