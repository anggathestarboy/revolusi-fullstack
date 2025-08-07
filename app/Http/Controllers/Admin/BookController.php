<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Shelf;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    // READ: Tampilkan semua buku
    public function index()
    {
        $books = Book::getAllBooks(5);
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        $shelves = Shelf::all();

        return view('pages.admin.book', compact('books', 'authors', 'categories', 'publishers', 'shelves'));
    }

    // READ: Tampilkan form tambah buku
    public function create()
    {
        return view('pages.admin.book.create', [
            'authors' => Author::all(),
            'categories' => Category::all(),
            'publishers' => Publisher::all(),
            'shelves' => Shelf::all(),
        ]);
    }

    // CREATE: Simpan buku baru
    public function store(BookRequest $request)
    {
        Book::storeBook($request->validated());
        return redirect('/admin/book')->with('success', 'Book created successfully.');
    }

    // READ: Tampilkan detail buku untuk edit
    public function edit(Book $book)
    {
        return view('pages.admin.book.edit', [
            'book' => $book,
            'authors' => Author::all(),
            'categories' => Category::all(),
            'publishers' => Publisher::all(),
            'shelves' => Shelf::all(),
        ]);
    }

    // UPDATE: Update buku
    public function update(BookRequest $request, Book $book)
    {
        $book->updateBook($request->validated());
        return redirect('/admin/book')->with('success', 'Book updated successfully.');
    }

    // DELETE: Hapus buku
    public function destroy(Book $book)
    {
        $book->deleteBook();
        return redirect('/admin/book')->with('success', 'Book deleted successfully.');
    }

    // READ: Tampilkan detail buku (opsional)
    public function show($book_id)
    {
        $book = Book::getBookDetail($book_id);
        if (!$book) {
            return abort(404);
        }

        return view('pages.admin.book.show', compact('book'));
    }
}
