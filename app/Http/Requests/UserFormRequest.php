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
            'name' => ['required', 'alpha'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'name' => strip_tags($this['name']),
            'email' => strip_tags($this['email']),
            'password' => strip_tags($this['password']),
        ]);
    }
}
