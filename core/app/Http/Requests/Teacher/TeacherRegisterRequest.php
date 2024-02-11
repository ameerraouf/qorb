<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRegisterRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name'     =>'required|min:3|string',
            // 'phone'    => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11|unique:teachers',
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'password' => ['required','confirmed','min:6','max:10'],
            // 'type'     => ['in:teacher,mother']
        ];
    }

  
}
