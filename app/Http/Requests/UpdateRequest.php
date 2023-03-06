<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=> 'required|unique:students|integer',
            'name'=> 'required|max:50|alpha',
            'email'=> 'required|unique:students|max:255|email',
            'phone'=> 'required|digits:11|unique:students',
            'department_id'=> 'required|max:255|min:1'
        ];
    }
    public function messages(){
        return[
            'id.required'=>'please enter the code field...',
            'department.required'=>'please select the department...',
            'id.unique'=>'The code already exists',
            'id.integer'=>'the code must be a number'
        ];
    }
}
