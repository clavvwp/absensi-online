<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin () {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau Kata Sandi salah'
            ]);
        }
        
        $request->session()->regenerate();
        $role = Auth::user()->role;

        if ($role == 'wali_kelas') {
            return redirect()->intended(route('wali_kelas.dashboard'));
        }

        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended(route('form.login'));
    }
}
