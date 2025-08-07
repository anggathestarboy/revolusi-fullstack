<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id); // Ambil user berdasarkan ID
        return view('pages.user.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'firstname' => 'required|string|max:150',
            'lastname' => 'required|string|max:150',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Biodata berhasil diperbarui.');
    }
}

