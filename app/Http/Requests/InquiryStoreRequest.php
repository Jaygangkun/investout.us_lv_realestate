<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryStoreRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'mobile_number'=>'required',
            'description'=>'required',
            'slot_id'=>'required',
        ];

    }
    public function messages()
    {
     return[
         'first_name.required'=>'First name is required!',
         'last_name.required'=>'Last name is required!',
         'email.required'=>'email is required!',
         'mobile_number.required'=>'mobile_numberis required!',
         'description.required'=>'description is required!',
         'slot_id'=>'Please select available slot!',
     ];
    }
}
