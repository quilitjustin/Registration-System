<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        //Authorize if admin or staff
        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'f-name' => ['required'],
            'l-name' => ['required'],
            'm-name' => ['required'],
            'student-id' => ['required', 'integer'],
            'contact-no' => ['required', 'digits:11'],
            'gender' => ['required', 'in:Male,Female'],
            'birthdate' => ['required', 'date'],
            'birthplace' => ['required'],
            'block' => ['required'],
            'house-no' => ['required', 'integer'],
            'street' => ['required'],
            'barangay' => ['required'],
            'municipality' => ['required'],
            'province' => ['required'],
            'guardian' => ['required'],
            'relation' => ['required'],
            'guardian-contact' => ['required', 'digits:11']
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'f-name' => strip_tags($this['f-name']),
            'l-name' => strip_tags($this['l-name']),
            'm-name' => strip_tags($this['m-name']),
            'student-id' => strip_tags($this['student-id']),
            'contact-no' => strip_tags($this['contact-no']),
            'gender' => strip_tags($this['gender']),
            'birthdate' => strip_tags($this['birthdate']),
            'birthplace' => strip_tags($this['birthplace']),
            'block' => strip_tags($this['block']),
            'house-no' => strip_tags($this['house-no']),
            'street' => strip_tags($this['street']),
            'barangay' => strip_tags($this['barangay']),
            'municipality' => strip_tags($this['municipality']),
            'province' => strip_tags($this['province']),
            'guardian' => strip_tags($this['guardian']),
            'relation' => strip_tags($this['relation']),
            'guardian-contact' => strip_tags($this['guardian-contact']),
        ]);
    }
}
