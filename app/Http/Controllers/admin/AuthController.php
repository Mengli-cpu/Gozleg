<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;




class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = $request->validate([
            'username' => ['required', 'min:3', 'max:25'],
            'password' => ['required', 'min:8', 'max:125'],
        ]);
        $throttleKey = Str::lower($request->input('username')) . '|' . $request->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return back()->withErrors([
                'username' => "Wait $seconds second.",
            ]);
        }

        if (Auth::attempt($user)) {
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();
            return redirect()->intended(route('auth.index'));
        }
        RateLimiter::hit($throttleKey, 60);

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
    public function loginIndex()
    {
        return view('auth.login');
    }
    public function admin()
    {
        return view('auth.admin.index');
    }
}
