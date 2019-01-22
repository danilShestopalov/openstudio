<?php

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
Route::get('/email', 'HomeController@email');

Route::get('/investor', function () {
    return view('investor');
});
Route::get('/card', function () {
    return view('card');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile', 'ProfileController');
    Route::resource('startup', 'StartupController');

    Route::post('startup/{startup}/like', 'StartupController@like');
});

Route::prefix('api')->group(function () {
    Route::get('/profiles', 'ProfileController@apiProfiles');
    Route::get('/startups', 'StartupController@apiStartups');
});

Route::get('/start', 'StartController@getJson');
Auth::routes();


