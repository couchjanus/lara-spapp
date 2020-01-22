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

Route::get('/posts', function () {
    return factory('App\Post', 10)->make();
});

Route::get('/users', function () {
    return factory('App\User', 10)->make();
});

Route::get('/categories', 'CategoryController@index')->name("api.categories.index");
Route::get('/categories/{category}', 'CategoryController@edit')->name("api.categories.edit");
Route::post('/categories', 'CategoryController@store')->name("api.categories.store");
Route::put('/categories/{category}', 'CategoryController@update')->name("api.categories.update");

// "destroy" => "api.categories.destroy",