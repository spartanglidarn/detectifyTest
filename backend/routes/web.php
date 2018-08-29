<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

date_default_timezone_set('Europe/Stockholm');
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/get-top-rated-movies/', 'TopRatedMoviesController@index');
