<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Admin\BookController;

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
            return redirect('/');
        }

        return view('pages.admin.dashboard');
    }

    public function studentPage()
    {
        if (!Auth::check() || Auth::user()->isadmin != 0) {
            return redirect('/');
        }

        return view('pages.user.home');
    }

    // ✅ Fungsi pengecekan role student
    private function ensureStudent()
    {
        if (!Auth::check() || Auth::user()->isadmin != 0) {
            redirect('/')->send();
            exit;
        }
    }

    // ✅ Fungsi gabungan logika role untuk route yang sama
    public function studentBooks()
    {
        if (Auth::user()->isadmin == 1) {
            // Admin akan diarahkan ke controller BookController
            return app(BookController::class)->index();
        }

        $this->ensureStudent();
        return view('pages.user.books'); // Buat file ini jika belum ada
    }
}
