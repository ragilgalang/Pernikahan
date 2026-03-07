<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Update google_id if it's not set
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->getId()]);
                }
                Auth::login($user);
            } else {
                // Create new user
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => Hash::make(Str::random(16)), // Random password
                ]);

                Auth::login($newUser);
            }

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Gagal login menggunakan Google. Silakan coba lagi.']);
        }
    }

    public function firebaseLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'google_id' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Update google_id if not set
            if (!$user->google_id) {
                $user->update(['google_id' => $request->google_id]);
            }
            Auth::login($user);
        } else {
            // Create new user if not exists
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'google_id' => $request->google_id,
                'password' => Hash::make(Str::random(16)),
            ]);
            Auth::login($user);
        }

        $redirect = route('dashboard');
        if ($request->filled('redirect_to')) {
            $redirect = $request->redirect_to;
        }

        return response()->json(['status' => 'success', 'redirect' => $redirect]);
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if ($request->filled('redirect_to')) {
                return redirect($request->redirect_to);
            }
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // For now, redirect to dashboard on post
        return redirect()->route('dashboard');
    }

    public function showForgotPassword()
    {
        return view('forgot-password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }
}
