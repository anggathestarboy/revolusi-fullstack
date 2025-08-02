<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Shelf;

class DashboardController extends Controller
{
    public function index()
{
    return view('pages.admin.dashboard', [
        'totalBooks' => Book::count(),
        'totalAuthors' => Author::count(),
        'totalUsers' => User::count(),
        'totalPublisher' => Publisher::count(),
        'totalCategory' => Category::count(),
        'totalShelf' => Shelf::count(),
        // 'totalBorrowings' => Borrowing::count(),
    ]);
}
}
