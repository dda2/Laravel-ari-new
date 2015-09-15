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

Route::get('/', [
    'uses'  => '\App\Http\Controllers\HomeController@index',
    'as'    => 'home',
]);

Route::get('/daftar', [ 
    'uses'  => '\App\Http\Controllers\AuthController@getSignup',
    'as'    => 'signup',
    'middleware' => ['guest']
]);

Route::post('/daftar/post', [
    'uses'  => '\App\Http\Controllers\AuthController@postSignup',
    'as' => 'signup.post'
]);

Route::get('/masuk', [
    'uses'  => '\App\Http\Controllers\AuthController@getSign',
    'as'    => 'signin',
    'middleware' => ['guest']
]);

Route::post('/masuk', [
    'uses'  => '\App\Http\Controllers\AuthController@postSignin',
    'as'    => 'signin.post'
]);

Route::get('/keluar', [
    'uses'  => '\App\Http\Controllers\AuthController@getSignout',
    'as'    => 'signout',
]);

