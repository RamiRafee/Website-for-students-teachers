<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'image'=> 'image|mimes:png,jpg',
            'department_id'=> 'required|max:255|min:1'
        ];
    }
    public function messages(){
        return[
            'id.required'=>'please enter the code field...!',
            'email.required'=>'please enter the email field...!',
            'phone.required'=>'please enter the phone field...!',
            'name.required'=>'please enter the name field...!',
            'department.required'=>'please select the department...!',
            'id.unique'=>'The code already exists',
            'id.integer'=>'the code must be a number'
        ];
    }
}
