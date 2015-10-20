<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	"as" => "index",
	"uses" => "MoviesController@index"
]);
Route::post('/search', [
	"as" => "search",
	"uses" => "MoviesController@search"
]);
Route::get('/actor/{id}', [
	"as" => "actor",
	"uses" => "MoviesController@getActor"
]);
