<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;

class UserBorrowingController extends Controller
{
    public function index()
{
    $user = Auth::user();

    $borrowings = Borrowing::with(['details.book']) // Ambil detail dan relasi ke book
        ->where('borrowing_user_id', $user->id)
        ->latest()
        ->get();

    return view('pages.student.borrowing', [
        'borrowings' => $borrowings,
        'user' => $user,
        'loggedIn' => Auth::check(),
        'menus' => [
            ['label' => 'Dashboard', 'href' => '/'],
            ['label' => 'Books', 'href' => '/student/books'],
            ['label' => 'Borrowings', 'href' => '/student/borrowing'],
        ],
    ]);
}


    public function markReturned(Borrowing $borrowing)
    {
        if ($borrowing->borrowing_user_id !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $borrowing->update([
            'borrowing_isreturned' => true
        ]);

        return back()->with('success', 'Peminjaman telah diselesaikan.');
    }
}
