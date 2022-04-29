<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'employee_id' => 'required|min:3|max:10|unique:users,employee_id,'.$this->id,
            'first_name' => 'required|min:2|max:20',
            'last_name' => 'required|min:2|max:20',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'mobile_no' => 'nullable|unique:users,mobile_no,'.$this->id,
            'role_type' => 'nullable',
            'username' => 'required|unique:users,username,'.$this->id,
            'password' => 'nullable|confirmed|min:6',
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
            'employee_id.required' => 'Employee ID is required',
            'first_name.required' => 'First name is required',
        ];
    }
}
