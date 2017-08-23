<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('php', function () {
    return view('php-ini');
});

Route::get('/', ['uses' => 'HomeController@index']);

Route::get('portfolio', ['uses' => 'HomeController@showPortfolio']);

Route::get('posts/portfolio', function() {
  return redirect()->route('portfolio');
});

Route::post('search', ['uses' => 'HomeController@searchURL']);
Route::get('search/{term}', ['uses' => 'HomeController@search']);

Route::get('about', ['uses' => 'HomeController@about']);

Route::get('contact', function() {
  return view('contact');
});

Route::get('posts', ['uses' => 'HomeController@showPosts']);

Route::get('posts/blogs', ['uses' => 'HomeController@showBlogs']);

Route::get('posts/{lookup_category}/{sub_category}/{url}', ['uses' => 'HomeController@showPost']);

Route::post('contact', ['uses' => 'HomeController@sendMessage']);

Route::group(['middleware' => ['auth'], 'prefix' => 'kevin'], function () {
  Route::get('/', ['uses' => 'AdminController@index']);
  Route::get('settings', function() {
    return view('admin/settings');
  });
  Route::post('settings', ['uses' => 'AdminController@updateSettings']);

  Route::get('blog', ['uses' => 'AdminController@newPost']);
  Route::post('blog', ['uses' => 'AdminController@storePost']);
  Route::get('blog/edit', ['uses' => 'AdminController@showBlogs']);
  Route::get('blog/edit/{id}', ['uses' => 'AdminController@editBlog']);
  Route::post('blog/edit/{id}', ['uses' => 'AdminController@updateBlogContent']);
  Route::get('blog/update/{id}', ['uses' => 'AdminController@editBlogData']);
  Route::post('blog/update/{id}', ['uses' => 'AdminController@updateBlog']);
  Route::get('images', ['uses' => 'AdminController@showUploadedImages']);
  Route::post('images', ['uses' => 'AdminController@uploadImage']);
  Route::post('images/delete', ['uses' => 'AdminController@deleteImage']);

  Route::get('users', ['uses' => 'AdminController@showUsers']);

  Route::patch('users/approve/{id}', ['as' => 'user.verify', 'uses' => 'AdminController@approveUser']);

  Route::get('sort', ['uses' => 'AdminController@showSorts']);
  Route::post('sort',['uses' => 'AdminController@updateSorts']);

  Route::get('sync', ['uses' => 'AdminController@sync']);
  Route::get('mail/{id}', ['uses' => 'AdminController@viewMail']);

  Route::post('kickstarter', ['uses' => 'AdminController@newKickstarter']);
  Route::get('kickstarter', ['uses' => 'AdminController@showKickstarters']);

  Route::get('fitbit', ['uses' => 'AdminController@getFitbitData']);
});

Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});
