<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }   
    public function register(Request $request) {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Here you would typically create the user in the database
        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('boardgames.index')->with('success', 'Registration successful! Please log in.');
    }

    public function login(Request $request) {
        // Validate the incoming request data
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Here you would typically attempt to authenticate the user
        if (Auth::attempt($validated)) {
            $request->session()->regenerate(); // Regenerate the session to prevent fixation
            return redirect()->route('boardgames.index')->with('success', 'Login successful!');
        }
        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return redirect()->route('show.login')->with('success', 'Logged out successfully!');
    }
}
