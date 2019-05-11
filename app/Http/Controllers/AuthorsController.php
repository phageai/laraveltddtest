<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\AuthorStoreRequest;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function store(AuthorStoreRequest $request)
    {
        return redirect(route('authors.show', [
            'author' => Author::create($request->validated()),
        ]));
    }
}
