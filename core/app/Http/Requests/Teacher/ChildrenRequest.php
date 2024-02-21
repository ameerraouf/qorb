<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class ChildrenRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    // 'name_ar'       => 'required|max:256|regex:/^[\p{Arabic} ]+$/u',
                    'name'       => 'required|max:256',
                    'problem'    => 'required|max:1000',
                    // 'name_ar'       => 'required|max:256',
                    // 'name_en'       => 'required|max:256',
                    // 'problem_ar'    => 'required|max:1000',
                    // 'problem_en'    => 'required|max:1000',
                    'age'           => 'required',
                    'images'        => 'nullable',
                    'images.*'      => 'nullable|mimes:pdf,jpg,jpeg,png,gif',
                    // 'status'      => 'required|integer|in:0,1',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    // 'name_ar'       => 'required|max:256|regex:/^[\p{Arabic} ]+$/u',
                    // 'name_ar'       => 'required|max:256',
                    // 'name_en'       => 'required|max:256',
                    // 'problem_ar'    => 'required|max:1000',
                    // 'problem_en'    => 'required|max:1000',
                    'name'       => 'required|max:256',
                    'problem'    => 'required|max:1000',
                    'age'           => 'required',
                    'images'        => 'nullable',
                    'images.*'      => 'nullable|mimes:pdf,jpg,jpeg,png,gif',
                    // 'status'      => 'required|integer|in:0,1',
                ];
            }
            default: break;
        }
    }


}
