<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;

class BooksController extends Controller
{
    public function store(BookStoreRequest $request)
    {
        return redirect(route('books.show', [
            'book' => Book::create($request->validated()),
        ]));
    }

    public function update(Book $book, BookUpdateRequest $request)
    {
        $book->update($request->validated());

        return redirect(route('books.show', compact('book')));
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect(route('books.index'));
    }
}
