<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/heroes', 'HeroController@index');

Route::post('/add-hero', 'HeroController@addHero');

Route::post('/login-hero', 'HeroController@loginHero');

Route::get('/authenticate-hero', 'HeroController@getAuthenticatedHero');

Route::post('/send_message', 'HeroController@sendMessage');

Route::get('/messages', 'HeroController@getAllMessages');


