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
Route::get('/pokedex/tipo/{tipo_id}', 'pokedexController@filtrar_tipo_pokedex');
Route::get('/pokedex/pokemon', 'pokedexController@busca_pokemon');
Route::get('/pdf/{id}', 'pokedexController@mPDF');

Route::get('/pokemon/lista', 'pokedexController@owned_pokemon')->name('lista');
Route::get('/pokemon/tipo/{tipo_id}', 'pokedexController@filtrar_tipo_pokemon');
Route::get('/pdf_owned/{id}', 'pokedexController@ownedPDF');
Route::post('/pokemon/powerup', 'pokedexController@poder');
Route::post('/pokemon/eliminar-tipo', 'pokedexController@eliminarTipo');

Route::get('/login', 'pokedexController@login')->name('login');
Route::post('/login-success', 'pokedexController@login_success');
Route::get('/logout', 'pokedexController@logout');