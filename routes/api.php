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

/*
    |--------------------------------------------------------------------------
    | Posts routes
    |--------------------------------------------------------------------------
*/
Route::get("/posts/all", "PostController@all");

Route::resource("posts", "PostController")->names([
    "index" => "api.posts.index",
    "store"  => "api.posts.store",
    "edit" => "api.posts.edit",
    "update" => "api.posts.update",
    "destroy" => "api.posts.destroy",
]);

Route::get("{category}/{post}", "PostController@show")->name("api.posts.show");

/*
    |--------------------------------------------------------------------------
    | Comments routes
    |--------------------------------------------------------------------------
*/
Route::get("/comments", "CommentController@index")->name("api.comments.index");
Route::post("{category}/{post}/comments", "CommentController@store")->name("api.comments.store");
Route::delete("comments/{comment}", "CommentController@destroy")->name("api.comments.destroy");

/*
    |--------------------------------------------------------------------------
    | Categories routes
    |--------------------------------------------------------------------------
    |
*/

Route::apiResource("categories", "CategoryController")->names([
    "index" => "api.categories.index",
    "store"  => "api.categories.store",
    "show" => "api.categories.show",
    "update" => "api.categories.update",
    "destroy" => "api.categories.destroy",
]);
Route::get("/categories/{category}/posts", "CategoryController@getPosts")->name("api.categories.posts");

/*
    |--------------------------------------------------------------------------
    | Tags routes
    |--------------------------------------------------------------------------
*/
Route::apiResource("tags", "TagController")->names([
    "index"     => "api.tags.index",
    "show"      => "api.tags.show",
    "update"    => "api.tags.update",
    "destroy"   => "api.tags.destroy",
])->except(["store"]);
Route::get("/tags/{tag}/posts", "TagController@getPosts")->name("api.tags.posts");


// Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
//     Route::post('login', 'AuthController@login')->name("auth.login");
//     Route::post('logout', 'AuthController@logout')->name("auth.logout");
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');
// });

Route::post('auth/login', 'AuthController@login')->name("auth.login");

Route::group(['middleware' => 'auth.jwt', 'prefix' => 'auth'], function ($router) {
    // Route::post('login', 'AuthController@login')->name("auth.login");
    Route::post('logout', 'AuthController@logout')->name("auth.logout");
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});



// Route::post('login', 'ApiController@login');
// Route::post('register', 'ApiController@register');

// Route::post('/register', 'UserController@register')->middleware('guest');
// Route::post('/login', 'UserController@login')->middleware('guest');
// Route::post('/update/token', 'UserController@updateToken');

// Route::group(['middleware' => 'auth.jwt'], function () {
//     // Route::get('logout', 'ApiController@logout');
// });

