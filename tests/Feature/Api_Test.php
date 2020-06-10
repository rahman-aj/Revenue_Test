<?php

namespace Tests\Feature;

use App\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Api_Test extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_movie_image()
    {
        $response = $this->get(route('moviedb-api'));
        $response->assertStatus(200);
        $this->assertCount(1, Movie::all());
    }


    public function test_search_movies()
    {
        $title = 'movie';
        $movie = new Movie([
            'title' => $title,
            'description' => 'movie title',
            'file_name' => '/z0iYrJ6GsAMP3abOha7uGMuc5kZ.jpg',
            'original_link' => "https://image.tmdb.org/t/p/original/z0iYrJ6GsAMP3abOha7uGMuc5kZ.jpg"
        ]);

        $movie->save();

        $this->get(route("search", $title))
            ->assertJsonStructure([
                'data' => [
                    '0' => [
                        'title',
                        'description',
                        'file_name',
                        'original_link'
                    ]
                ]
            ]);
        
    }

}
