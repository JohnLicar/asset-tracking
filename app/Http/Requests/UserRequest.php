<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'idnumber' => 'required|min:6',
            'first_name' => 'required|min:2',
            'middle_name' => 'required|min:2|nullable',
            'last_name' => 'required|min:2',
            'role' => 'required',
            'email' => ['required', 'email', 'unique:users,email', 'regex:/(.*)@(gmail|deped.gov)\.(com|ph)/i'],
            'contact_number' => 'required|min:9|unique:users',
            'position_id' => 'required_if:role,client',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:5048|nullable'
        ];
    }

    public function messages()
    {
        return ['email.regex' => 'Please use google account'];
    }
}
