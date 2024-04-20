<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonService extends FormRequest
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
            'code'=>'required',
            'name'=>'required',
            'description'=>'required'
        ];
    }
    public function messages():array
    {
        return[
            'code.required' => 'Vui lòng nhập mã Quốc gia',
            'name.required' => 'Vui lòng nhập tên Quốc gia',
            'description.required' => 'Vui lòng nhập mô tả Quốc gia'
        ];
    }
}
