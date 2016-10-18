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

Route::get('/', ['uses' => 'HomeController@index']);

Route::get('portfolio', ['uses' => 'HomeController@showPortfolio']);

Route::get('posts/portfolio', function() {
  return redirect()->route('portfolio');
});

Route::get('about', function() {
  return view('about-me');
});

Route::get('contact', function() {
  return view('contact');
});

Route::get('posts', ['uses' => 'HomeController@showPosts']);

Route::get('posts/blogs', ['uses' => 'HomeController@showBlogs']);

Route::get('posts/{lookup_category}/{sub_category}/{url}', ['uses' => 'HomeController@showPost']);

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
  Route::post('blog/edit/{id}', ['uses' => 'AdminController@updateBlog']);

  Route::get('users', ['uses' => 'AdminController@showUsers']);

  Route::patch('users/approve/{id}', ['as' => 'user.verify', 'uses' => 'AdminController@approveUser']);
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
