<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'membership_Id' => "required|exists:members,id",
            'first_name' => "required",
            'middle_names' => "sometimes",
            'last_name' => "required",
            'phone' => "required",
            'email' => "required",
            'street' => "required",
            'city' => "required",
            'country' => "required",
            'zip' => "sometimes",
            'bio' => "sometimes",
        ];
    }
}
