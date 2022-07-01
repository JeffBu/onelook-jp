<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\Subscribers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'company_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'username' => ['required', 'string', 'max:10'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'username' => $input['username'],
                'name' => $input['full_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) use($input) {
                $this->createSubscriber($user, $input);
                $user->update([
                    'login_id' => 'U'.date('Y').$user->id
                ]);
                $user->save();
            });
        });
    }

    /**
     * Create a subscriber record for the user.
     *
     * @param \App\Models\User $user
     * @param $input
     * @return void
     */

     protected function createSubscriber(User $user, $input)
     {
        Subscribers::forceCreate([
            'user_id' => $user->id,
            'company' => $input['company_name'],
            'address' => $input['address'],
            'phone_number' => $input['phone_number']
        ]);
     }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
