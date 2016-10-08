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

Route::get('/', 'pokedexController@inicio');
Route::get('/owned', 'pokedexController@owned');
Route::get('/pokedex/tipo/{tipo_id}', 'pokedexController@filtrar_tipo');
Route::get('/pokedex/pokemon', 'pokedexController@busca_pokemon');
Route::get('/pdf/{id}', 'pokedexController@mPDF');
Route::get('/login', 'pokedexController@login');
Route::post('/login-success', 'pokedexController@login_success');