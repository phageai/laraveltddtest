<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store(BookStoreRequest $request)
    {
        Book::create($request->validated());
    }

    public function update(Book $book, BookUpdateRequest $request)
    {
        $book->update($request->validated());
    }
}
