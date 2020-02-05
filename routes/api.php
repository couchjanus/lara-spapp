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



Route::get('/allusers', 'UserController@index')->name("api.users.index");

Route::get("/posts", "PostController@index");
Route::get("/posts/all", "PostController@latest");

Route::post('/posts', 'PostController@store')->name("api.posts.store");

Route::get('/categories', 'CategoryController@index')->name("api.categories.index");
Route::get('/categories/{category}', 'CategoryController@edit')->name("api.categories.edit");
Route::post('/categories', 'CategoryController@store')->name("api.categories.store");
Route::put('/categories/{category}', 'CategoryController@update')->name("api.categories.update");
Route::delete('/categories/{category}', 'CategoryController@destroy')->name("api.categories.destroy");

Route::get("{category}/{post}", "PostController@show")->name("api.posts.show");

Route::get("/tags", "TagController@index")->name("api.tags.index");
Route::post('/tags', 'TagController@store')->name("api.tags.store");

Route::post('/register', 'UserController@register')->middleware('guest');
Route::post('/login', 'UserController@login')->middleware('guest');
Route::post('/update/token', 'UserController@updateToken');


Route::get("/comments", "CommentController@index")->name("api.comments.index");
Route::post("{category}/{post}/comments", "CommentController@store")->name("api.comments.store");
Route::delete("comments/{comment}", "CommentController@destroy")->name("api.comments.destroy");


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login')->name("auth.login");
    Route::post('logout', 'AuthController@logout')->name("auth.logout");
});