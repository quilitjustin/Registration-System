<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserUpdateFormRequest extends FormRequest
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

    //This would specify what kind of update would happen
    private $rule;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {   
        $this->rule = $this->request->get('action');
        $id = strip_tags($this->request->get('id'));
        if($this->rule == 'details'){
            /**
             * 'regex:/^[a-zA-Z ]*$/' = uppercase, lowercase, whitespace
             * 'regex:/^[09]{2}[0-9]{9}+$/' = must start with 09 then, 9 integer 
             * \Illuminate\Validation\Rule::unique('users')->ignore($id) = will ignore his own unique email
             * 'confired' = will confirm 'password' field with 'password_confirmation' field
             */
            return [
                'f-name' => ['required', 'regex:/^[a-zA-Z ]*$/'],
                'l-name' => ['required', 'regex:/^[a-zA-Z ]*$/'],
                'm-name' => ['required', 'regex:/^[a-zA-Z ]*$/'],
                'gender' => ['required', 'in:Male,Female'],
                'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($id)],
                'contact-no' => ['required', 'regex:/^[09]{2}[0-9]{9}+$/'],
                'action' => ['required', 'in:details'],
            ];
        }
        if($this->rule == 'password'){
            return [
                'password' => ['required', 'confirmed', 'min:8'],
                'action' => ['required', 'in:password'],
            ];
        }

        //Return an 404 if action has been modified
        abort(404);
        
    }

    protected function prepareForValidation(){
        if($this->rule == 'details'){
            $this->merge([
                'f-name' => strip_tags($this['f-name']),
                'l-name' => strip_tags($this['l-name']),
                'm-name' => strip_tags($this['m-name']),
                'gender' => strip_tags($this['gender']),
                'email' => strip_tags($this['email']),
                'contact-no' => strip_tags($this['contact-no']),
                'action' => strip_tags($this['action']),
            ]);
        }
        if($this->rule == 'password'){
            $this->merge([
                'password' => strip_tags($this['password']),
                'action' => strip_tags($this['action']),
            ]);
        }
    }
}
