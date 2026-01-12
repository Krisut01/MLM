<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
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
        // ⭐ Enhanced validation with sponsor_id
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'sponsor_id' => [
                'nullable',
                'integer',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $sponsor = User::find($value);
                        if ($sponsor && !$sponsor->is_active) {
                            $fail('The selected sponsor is not active.');
                        }
                    }
                },
            ],
        ])->validate();

        // ⭐ Create user with sponsor_id
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'sponsor_id' => $input['sponsor_id'] ?? null,
            'is_active' => true,
        ]);

        // ⭐ Log registration with sponsor info
        Log::info('New user registered', [
            'user_id' => $user->id,
            'email' => $user->email,
            'sponsor_id' => $user->sponsor_id,
            'has_sponsor' => !is_null($user->sponsor_id)
        ]);

        return $user;
    }
}
