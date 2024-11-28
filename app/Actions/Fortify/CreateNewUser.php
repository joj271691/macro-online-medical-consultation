<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'specialization' => ['required_if:role,doctor', 'string', 'max:255'],
            'medical_license_number' => ['required_if:role,doctor', 'string', 'unique:doctors'],
            'license_expiry_date' => ['required_if:role,doctor', 'date'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

         $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'], 
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'] ?? null,
            'address' => $input['address'] ?? null,
            'gender' => $input['gender'] ?? null,
            'date_of_birth' => $input['date_of_birth'] ?? null,
        ]);

        if ($input['role'] === 'doctor') {
            Doctor::create([
                'user_id' => $user->id, // Link to users table
                'specialization' => $input['specialization'],
                'medical_license_number' => $input['medical_license_number'],
                'license_expiry_date' => $input['license_expiry_date'],
            ]);
        } 
        elseif ($input['role'] === 'patient') {
            Patient::create([
                'user_id' => $user->id,
                'phone' => $input['phone'] ?? null,
                'address' => $input['address'] ?? null,
                'gender' => $input['gender'] ?? null,
                'date_of_birth' => $input['date_of_birth'] ?? null,
                
            ]);
        }

        return $user;

    }
}
