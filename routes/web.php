<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('books', 'BooksController@index')->name('books.index');
Route::get('books/{book}', 'BooksController@show')->name('books.show');
Route::post('books', 'BooksController@store')->name('books.store');
Route::patch('books/{book}', 'BooksController@update')->name('books.update');
Route::delete('books/{book}', 'BooksController@destroy')->name('books.delete');

Route::get('authors/{author}', 'AuthorsController@show')->name('authors.show');
Route::post('authors', 'AuthorsController@store')->name('authors.store');
