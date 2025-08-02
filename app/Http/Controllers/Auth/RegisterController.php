<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('pages.auth.register');
    }


    public function store(Request $request) {
        $request->validate([
            'firstname' => 'required|max:150',
            'lastname' => 'required|max:150',
            'username' => 'required|max:150',
            'email' => 'required|max:150',
            'password' => 'required|max:150',

        ]);


        User::create($request->all());
        return redirect('/register')->with('success', 'data berhasil di kirim');
    }
}
