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
        $action = $this->request->get('action');
        $id = strip_tags($this->request->get('id'));
        if($action == 'details'){
            return [
                'name' => ['required', 'alpha'],
                'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($id)],
                'action' => ['required', 'in:details,password'],
            ];
        }
        if($action == 'password'){
            return [
                'action' => ['required', 'in:details,password'],
                'password' => ['required', 'min:8']
            ];
        }

        //Return an 404 if action has been modified
        abort(404);
        
    }
}
