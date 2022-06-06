<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicant extends FormRequest
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
            //Member details
            'email' => 'required|email|max:255',
            'first_name' => 'required|max:255',
            'middle_names' => 'sometimes|max:255',
            'last_name' => 'required|max:255',
            'dob'  =>  'required',
            'city' => 'required',
            'country' => 'required',
            'apartment' => 'sometimes|max:255',
            'street' => 'required|max:255',
            'zip' => 'sometimes',
            "gender" => "required|in:f,m",
            "phone" => 'required',
            //Next of kin details
            "nok_city" => 'required',
            "nok_country" => 'required',
            "nok_dob" => 'required',
            "nok_email" => 'required|email|max:255',
            "nok_full_name" => 'required|max:255',
            "nok_phone" => 'required',
            "nok_street" => 'required',
            "nok_apartment" => 'sometimes',
            "nok_zip" => 'sometimes',
            //nominees
            "nominees" => 'required',
            //Terms
            "read_constitution" => 'required',
            "certify_details" => 'required',
            "uk_resident" => 'required',
            //payment
            // "orderID" => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'form_name.unique' => 'The template name should be unique',
            "nok_city.required" => 'Nex of Kin\'s City is required',
            "nok_country.required" => 'Nex of Kin\'s country is required',
            "nok_dob.required" => 'Nex of Kin\'s Date of Birth is required',
            "nok_email.required" => 'Nex of Kin\'s Email is required',
            "nok_full_name.required" => 'Nex of Kin\'s Full Name is required',
            "nok_phone.required" => 'Nex of Kin\'s Phone is required',
            "nok_street.required" => 'Nex of Kin\'s Street is required',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    // protected function prepareForValidation()
    // {
    //     $this->merge([
    //         'dob' => strtotime($this->dob)
    //     ]);
    // }
}
