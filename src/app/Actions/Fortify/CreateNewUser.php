<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'family_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'family_name_hira' => ['required', 'string', 'max:255'],
            'first_name_hira' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'generation' => ['required', 'integer', 'max:3']
        ])->validate();

        return User::create([
            'family_name' => $input['family_name'],
            'first_name' => $input['first_name'],
            'family_name_hira' => $input['family_name_hira'],
            'first_name_hira' => $input['first_name_hira'],
            'email' => $input['email'],
            'generation' => $input['generation'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
