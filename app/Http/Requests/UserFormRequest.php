<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        //Authorize if admin only
        if(auth()->user()->role == "admin"){
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
        /**
         * 'regex:/^[a-zA-Z ]*$/' = uppercase, lowercase, whitespace
         * 'regex:/^[09]{2}[0-9]{9}+$/' = must start with 09 then, 9 integer 
         * 'confired' = will confirm 'password' field with 'password_confirmation' field
         */
        return [
            'f-name' => ['required', 'regex:/^[a-zA-Z ]*$/'],
            'l-name' => ['required', 'regex:/^[a-zA-Z ]*$/'],
            'm-name' => ['required', 'regex:/^[a-zA-Z ]*$/'],
            'gender' => ['required', 'in:Male,Female'],
            'email' => ['required', 'email', 'unique:users'],
            'contact-no' => ['required', 'regex:/^[09]{2}[0-9]{9}+$/'],
            'password' => ['required', 'confirmed', 'min:8']
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'f-name' => strip_tags($this['f-name']),
            'l-name' => strip_tags($this['l-name']),
            'm-name' => strip_tags($this['m-name']),
            'gender' => strip_tags($this['gender']),
            'email' => strip_tags($this['email']),
            'contact-no' => strip_tags($this['contact-no']),
            'password' => strip_tags($this['password']),
        ]);
    }
}
