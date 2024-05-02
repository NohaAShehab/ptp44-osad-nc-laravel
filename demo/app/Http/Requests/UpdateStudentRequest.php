<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        dd($this->id);
//        dd(Auth::user());
        $user = Auth::user();
//        dd($user->can('update',$this->id ));
        $student = Student::find($this->id);
        return $user->can('update',$student);
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
            'email' => Rule::unique('students')->ignore($this->id),
            'grade'=>'required'
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Student Name is required',
            'email.unique' => 'Student Email is already taken before',
            'grade.required' => 'You must add grade to the student',
        ];
    }
}
