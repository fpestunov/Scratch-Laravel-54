<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testSideBarTest()
    {
        // Given I have two records in the database that are post
        // and each one is posted a month apart.
        $first = factory(Post::class)->create();
        $first = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        // When I fetch the archives.
        $posts = Post::archives();

        // что на выходе?
        // array[array[]]
        //dd($posts);

        // Then the response should be in the proper format.
        //$this->assertCount(2, $posts);

        // Or
        $this->assertEquals([
            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1
            ],

            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1
            ]
        ], $posts);
    }
}
