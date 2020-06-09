<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $url = 'https://api.themoviedb.org/3/movie/495764?api_key=1a7d45b81aef17ad8e5bc930c17b6a2b&append_to_response=images';
        $baseImageUrl = 'https://image.tmdb.org/t/p/original';
        $api_key = '?api_key=1a7d45b81aef17ad8e5bc930c17b6a2b';

        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $json = json_decode($body);

        $movie = new Movie([
            'title' => $json->{'title'},
            'description' => $json->{'overview'},
            'file_name' => substr($json->{'backdrop_path'}, strrpos($json->{'backdrop_path'}, '/') + 1),
            'original_link' => "{$baseImageUrl}{$json->{'backdrop_path'}}{$api_key}"
        ]);

        $movie->save();

        return response("Done", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
