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
        $url = config('services.moviedb.url'); 
        $baseImageUrl = config('services.moviedb.base_image_url');
        $api_key = config('services.moviedb.api_key');

        $response = $client->request('GET', $url);
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
    public function show($title)
    {
        $movies = Movie::query()
            ->where('title', 'LIKE', "%{$title}%")
            ->select('movies.title', 'movies.description', 'movies.file_name', 'movies.original_link')
            ->get();

        return response()->json(['data' => $movies]);
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
