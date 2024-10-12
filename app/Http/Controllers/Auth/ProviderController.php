<?php

namespace App\Http\Controllers\Auth;

use App\Domains\Profile\Models\Profile;
use App\Domains\User\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $SocialUser = Socialite::driver($provider)->user();
            // dd($SocialUser);

            $user = User::where('email', $SocialUser->getEmail())->first();

            if ($user && $user->provider !== $provider) {
                flash()->error('This email is already registered.');
                return redirect('/login');
            }

            $user = User::updateOrCreate([
                'provider_id' => $SocialUser->id,
                'provider' => $provider,
            ], [
                'name' => $SocialUser->nickname ?? $SocialUser->name,
                'email' => $SocialUser->email,
                'provider_token' => $SocialUser->token,
            ]);

            Profile::updateOrCreate([
                'user_id' => $user->id,
            ], [
                'user_id' => $user->id,
                'avatar' => $SocialUser->avatar,
                'bio' => $SocialUser->user['bio'],
                'fullname' => $SocialUser->name,
                'github_link' => $SocialUser->user['html_url'],
            ]);

            Auth::login($user);

            return redirect('/user/dashboard');
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
