<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.coba.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['username' => 'Username atau password salah.']);
        }

        Auth::login($user);
        $request->session()->regenerate();

        // Redirect sesuai role
        return $user->isadmin ? redirect('/admin') : redirect('/student');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function adminPage()
    {
        if (!Auth::check() || Auth::user()->isadmin != 1) {
            abort(403, 'Akses hanya untuk admin');
        }

        return view('pages.admin.dashboard'); // ganti sesuai view admin kamu
    }

    public function studentPage()
    {
        if (!Auth::check() || Auth::user()->isadmin != 0) {
            abort(403, 'Akses hanya untuk student');
        }

        return view('pages.user.home'); // ganti sesuai view student kamu
    }
}
