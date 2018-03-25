<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    
    Route::get('/', 'PostController@index');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts/{post}/comments', 'CommentController@store');
    
    Route::get('/admin', 'Admin\AdminController@index');
    Route::get('/admin/posts', 'Admin\PostController@index');
    Route::get('/admin/posts/create', 'Admin\PostController@create');
    Route::post('/admin/posts', 'Admin\PostController@store');
    Route::get('/admin/posts/{post}/edit', 'Admin\PostController@edit');
    Route::patch('/admin/posts/{post}', 'Admin\PostController@update');
    Route::delete('/admin/posts/{post}', 'Admin\PostController@destroy');
});
