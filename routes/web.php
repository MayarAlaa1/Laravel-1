<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function(){

    Route::get('/posts', 'PostController@index')->name('posts.index');

    //route for rendering form
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    
    
    //route for taking the submition and storing the data in db
    Route::post('/posts', 'PostController@store')->name('posts.store');
    
    
    Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

    Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');

    Route::put('/posts/{post}', 'PostController@update')->name('posts.update');

    Route::delete('posts/{post}/delete', 'PostController@destroy')->name('posts.destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//used with the button of login to github
// Route::get('login/github', 'Auth\LoginController@redirectToProvider');
// //used in callback url in github and in services.php
// Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

// //used with the button of login to google
// Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider');
// //used in callback url in google and in services.php
// Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');


Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
//used in callback url in github and in services.php
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');
