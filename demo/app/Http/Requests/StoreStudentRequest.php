<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            //
            'name' => 'required',
            'email' => 'unique:students',
            'grade'=>'required'
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Student Name is required',
            'email.unique' => 'Student Email is already registered before',
            'grade.required' => 'You must add grade to the student',
        ];
    }
}
