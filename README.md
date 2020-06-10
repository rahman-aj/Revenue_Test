# Project Title

Revenue Test

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites

What things you need to install the software and how to install them

```
PHP >= 7.2.5
BCMath PHP Extension
Ctype PHP Extension
Fileinfo PHP extension
JSON PHP Extension
Mbstring PHP Extension
OpenSSL PHP Extension
PDO PHP Extension
Tokenizer PHP Extension
XML PHP Extension
GuzzleHttp ~ 6.0

```

### Installing

Install Composer 

then using Composer install Laravel: 
composer global require laravel/installer

Install Guzzle using composer:
composer require guzzlehttp/guzzle:~6.0


### Tips

* To run the tests:

./vendor/bin/phpunit ( You need the project running ).

* Helpful URLS:

localhost:port/moviedb-api ( Gets the 'Title, description, filename, and original link' of the movie ).
But first you need to know the id of the movie, and backdrop_path of the image.

localhost:port/search/{what you are looking for} ( This will return the result of the search in the local database ).
The search depends on the title attribute.


* To start the project run:

php artisan serve

To change the port run:

php artisan serve --port=YourPort

