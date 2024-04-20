<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequests extends FormRequest
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
            'role'=>'required',
            'description'=>'required'
        ];
    }
    public function messages():array
    {
        return[
            'role.required' => 'Vui lòng nhập vai trò',
            'description.required' => 'Vui lòng nhập mô tả'
        ];
    }
}
