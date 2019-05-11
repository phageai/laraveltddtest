<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Cool Book',
            'author' => 'Chris',
        ]);

        $response->assertOk();

        $this->assertCount(1, Book::all());
    }
    
    /** @test */
    public function a_title_is_required_to_add_book()
    {
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Chris',
        ]);

        $response->assertSessionHasErrors('title');

    }

    /** @test */
    public function an_author_is_required_to_add_book()
    {
        $response = $this->post('/books', [
            'title' => 'Cool Book',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'Cool Book',
            'author' => 'Chris',
        ]);

        $book = Book::first();

        $response = $this->patch('/books/' . $book->id, [
            'title' => 'New Title',
            'author' => 'New Author',
        ]);

        $this->assertEquals('New Title', $book->fresh()->title);
        $this->assertEquals('New Author', $book->fresh()->author);
    }

}
