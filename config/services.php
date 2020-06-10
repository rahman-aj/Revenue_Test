<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'moviedb' => [
        'base_image_url' => env('BASE_IMAGE_URL', 'https://image.tmdb.org/t/p/original'),
        'api_key' => env('API_KEY', '?api_key=1a7d45b81aef17ad8e5bc930c17b6a2b'),
        'url' => env('URL', 'https://api.themoviedb.org/3/movie/495764?api_key=1a7d45b81aef17ad8e5bc930c17b6a2b&append_to_response=images')
    ]
];
