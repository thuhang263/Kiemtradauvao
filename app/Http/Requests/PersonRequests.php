<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name'=>'required',
            'gender'=>'required',
            'birthdate'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
            'user_id'=>'required',
            'company_id'=>'required',
        ];
    }
    public function messages():array
    {
        return[
            'full_name.required' => 'Vui lòng nhập tên',
            'gender.required' => 'Vui lòng nhập giới tính',
            'birthdate.required' => 'Vui lòng nhập năm sinh',
            'phone_number.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'user_id.required' => 'Vui lòng nhập tên tài khoản',
            'company_id.required' => 'Vui lòng nhập tên công ty'
        ];
    }
}
