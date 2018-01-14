<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Users\Models\User;

class FacebookAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect(route('home'));
    }

    private function findOrCreateUser($user)
    {
        $authUser = User::where('email', $user->email)->first();

        if($authUser) {
            return $authUser;
        }

        $authUser = User::where('facebook_id', $user->id)->first();

        if($authUser) {
            return $authUser;
        }

        return $this->registerUser($user);
    }

    private function registerUser($user)
    {
        $user = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => rand(1,10),
            'facebook_id' => $user->id,
            'facebook_avatar' => 'ddd',
        ]);

        $user->assignRole(1);

        return $user;
    }
}
