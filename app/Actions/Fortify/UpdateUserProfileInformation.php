<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    //Sanitize input and capitalize 
    private function format($data){
        return ucwords(
                strtolower(
                    strip_tags($data)));
    }

    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            /**
             * 'regex:/^[a-zA-Z ]*$/' = uppercase, lowercase, whitespace
             * 'regex:/^[09]{2}[0-9]{9}+$/' = must start with 09 then, 9 integer 
             *  Rule::unique('users')->ignore($user->id) = will ignore his own unique email
             */
            'f_name' => ['required', 'regex:/^[a-zA-Z ]*$/'],
            'l_name' => ['required', 'regex:/^[a-zA-Z ]*$/'],
            'm_name' => ['required', 'regex:/^[a-zA-Z ]*$/'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'gender' => ['required', 'in:Male,Female'],
            'contact_no' => ['required', 'regex:/^[09]{2}[0-9]{9}+$/'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'f_name' => $this->format($input['f_name']),
                'l_name' => $this->format($input['l_name']),
                'm_name' => $this->format($input['m_name']),
                'contact_no' => strip_tags($input['contact_no']),
                'gender' =>strip_tags($input['gender']),
                'email' => strip_tags($input['email']),
                'updated_by' => \Auth::id(),
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
