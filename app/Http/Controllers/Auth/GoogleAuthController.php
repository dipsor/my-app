<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Users\Models\User;

class GoogleAuthController extends Controller
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
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

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

        $authUser = User::where('google_id', $user->id)->first();

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
            'google_id' => $user->id,
            'google_avatar' => 'ddd',
        ]);

        $user->assignRole(1);

        return $user;
    }
}
