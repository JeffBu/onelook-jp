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
use App\Mail\NewRegistration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;

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
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ])->validate();

        return DB::transaction(function () use ($input) {
            $user = User::create([
                'name' => $input['full_name'],
                'email' => $input['email'],
                'password' => Hash::make(Str::random(10)),
                'email_verification_token' => Str::random(100),
            ]);

            if($input['company_name'] != '' && $input['company_name'] != null)
            {
                $this->createSubscriber($user, $input);
            }

            $user->createToken('AuthToken');
            $this->sendMail($user);

            Session::put('message', 'Account created. Check your email for confirmation.');
            return redirect()->route('view-plans');
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

    protected function sendMail(User $user)
    {
        if($user)
        {
            Mail::to($user->email)->send(new NewRegistration($user->email_verification_token, $user->email, $user->name));
        }
    }
}
