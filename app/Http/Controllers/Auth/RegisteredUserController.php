<?php

namespace App\Http\Controllers\Auth;

use App\Domains\Profile\Models\Profile;
use App\Http\Controllers\Controller;
use App\Domains\User\Models\User;
use App\Mail\UserRegisterMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Profile::create([
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Mail::to($user->email)->send(new UserRegisterMail());

        Auth::login($user);

        if (!Auth::user()->is_admin) {
            return redirect()->intended(route('user.dashboard', ['user' => Auth::user()],  false));
        }

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }
}
