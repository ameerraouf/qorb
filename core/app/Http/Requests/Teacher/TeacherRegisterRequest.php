<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
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

    // public function messages()
    // {
    //     return [
    //         'name.required'   => trans('Admin\validation.required'),
    //         'email.required'       => trans('Admin\validation.required'),
    //         'phone.required'       => trans('Admin\validation.required'),
    //         'password.required'    => trans('Admin\validation.required'),

    //         'name.min'        => trans('Admin\validation.min'),
    //         'phone.min'            => trans('Admin\validation.min'),
    //         'password.min'         => trans('Admin\validation.min'),

    //         'phone.regex'          => trans('Admin\validation.regex'),

    //         'email.email'          => trans('Admin\validation.email'),
    //         'email.unique'         => trans('Admin\validation.unique'),
    //         'phone.unique'         => trans('Admin\validation.unique'),
    //         'password.confirmed'   => trans('Admin\validation.confirmed'),
    //     ];
    // }
}
