<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\FormRequest;

class profileUpdate extends FormRequest
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


    public function messages()
    {
        return [
           'first_name.required'=>'First Name is required',
           'last_name.required'=>'Last Name is required',
           'socialmedia.regex'=>'Please provide a valid url of your Facebook Profile',
           'email.required'=>"Please provide your email",
           'location.required'=>"Please provide your address",
           'phone.required'=>"Please provide a phone number",
         ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            // 'socialmedia'=>'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/|string',
            'email'=>'required|string|email|max:255',
            'profile_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'location'=>'required|string',
            'phone'=>'required|string',
          ];
    }
}
