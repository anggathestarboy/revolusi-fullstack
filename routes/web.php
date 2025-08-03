<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PublisherController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ShelfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\HomeController;

Route::prefix('/admin')->group(function() {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/', 'index')->name('admin.dashboard')->middleware('auth');
    });
});


Route::get('/', [HomeController::class, 'index']);




Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);







Route::resource('book', BookController::class);

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman dashboard yang dibatasi role, tapi tanpa middleware
Route::get('/student', [LoginController::class, 'studentPage']);
Route::get('/admin', [LoginController::class, 'adminPage']);



use App\Http\Controllers\Student\StudentBookController;

Route::prefix('student')->middleware(['auth'])->group(function () {
    Route::get('/books', [StudentBookController::class, 'index'])->name('student.books.index');




});


Route::middleware('auth')->group(function () {
    Route::get('/admin', [LoginController::class, 'adminPage'])->name('admin.dashboard');
    Route::get('/student', [LoginController::class, 'studentPage'])->name('student.dashboard');
    
Route::controller(AdminAuthorController::class)->group(function () {
    Route::get('/author', 'index')->name('admin.author');
    Route::post('/author', 'store')->name('admin.author.store');
    Route::patch('/author/{author_id}', 'update')->name('admin.author.update');
    Route::delete('/author/{author_id}', 'delete')->name('admin.author.delete');
});


    Route::get('/publisher', [PublisherController::class, 'index'])->name('admin.publisher');
    Route::post('/publisher/store', [PublisherController::class, 'store'])->name('admin.publisher.store');
    Route::patch('/publisher/update/{publisher_id}', [PublisherController::class, 'update'])->name('admin.publisher.update');
    Route::delete('/publisher/delete/{publisher_id}', [PublisherController::class, 'delete'])->name('admin.publisher.delete');


    Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('admin.category');
    Route::post('/category', 'store')->name('admin.category.store');
    Route::patch('/category/{category_id}', 'update')->name('admin.category.update');
    Route::delete('/category/{category_id}', 'delete')->name('admin.category.delete');
});


    Route::controller(ShelfController::class)->group(function () {
    Route::get('/shelf', 'index')->name('admin.shelf');
    Route::post('/shelf', 'store')->name('admin.shelf.store');
    Route::patch('/shelf/{shelf_id}', 'update')->name('admin.shelf.update');
    Route::delete('/shelf/{shelf_id}', 'delete')->name('admin.shelf.delete');
});

 Route::get('borrowing', [\App\Http\Controllers\Admin\BorrowingController::class, 'index'])->name('admin.borrowings.index');
    Route::post('borrowing/{id}/update', [\App\Http\Controllers\Admin\BorrowingController::class, 'update'])->name('admin.borrowings.update');
});





use App\Http\Controllers\BorrowingController;

Route::middleware(['auth'])->group(function () {
    Route::prefix('/admin')->group(function() {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/', 'index')->name('admin.dashboard');
    });
});
    Route::post('/borrow/{book}', [BorrowingController::class, 'borrowBook'])->name('borrow.book');
});



use App\Http\Controllers\UserBorrowingController;

Route::middleware(['auth'])->group(function () {
    Route::get('/student/borrowing', [UserBorrowingController::class, 'index'])->name('user.borrowings');
    Route::post('/student/{borrowing}/return', [UserBorrowingController::class, 'markReturned'])->name('user.borrowings.return');
});





