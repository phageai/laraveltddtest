<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function an_author_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post(route('authors.store'), [
            'name' => 'Victor Hugo',
            'dob' => '10/20/1854',
        ]);

        $author = Author::first();

        $this->assertCount(1, Author::all());
        $this->assertInstanceOf(Carbon::class, $author->dob);
        $this->assertEquals('1854/10/20', $author->dob->format('Y/m/d'));

        $response->assertRedirect(route('authors.show', compact('author')));
    }

}
