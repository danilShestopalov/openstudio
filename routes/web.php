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


Route::get('/investor', function () {
    return view('investor');
});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile', 'ProfileController');
    Route::resource('startup', 'StartupController');
    Route::get('idea', 'IdeaController@index')->name('idea.index');
    Route::get('idea/create', 'IdeaController@create')->name('idea.create');
    Route::get('idea/{idea}', 'IdeaController@show')->name('idea.show');
    Route::post('idea', 'IdeaController@store')->name('idea.store');
    Route::post('idea/{id}/like', 'IdeaController@like')->name('idea.like');
    Route::post('/comment/create/{id}', 'ICommentController@store')->name('icomment.store');
    Route::get('icomment/{id}', 'ICommentController@show');
    Route::post('startup/{startup}/like', 'StartupController@like');
    Route::post('file/upload/{id}/startup', 'StartupController@uploadStartupFile')->name('startup.fileUpload');
});

Route::get('/permission', 'Admin\PermissionController@index');
Route::get('/permission/create', 'Admin\PermissionController@create');
Route::post('/permission', 'Admin\PermissionController@store')->name('admin.permission.store');

Route::get('/role', 'Admin\RoleController@index');
Route::get('/role/create', 'Admin\RoleController@create');
Route::post('/role', 'Admin\RoleController@store')->name('admin.role.store');

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
    Route::get('idea', 'Admin\IdeaController@index')->name('admin.idea.index');
    Route::patch('idea/{idea}', 'Admin\IdeaController@update')->name('admin.idea.update');
    Route::get('idea/{idea}', 'Admin\IdeaController@edit')->name('admin.idea.edit');
    Route::delete('idea/{idea}', 'Admin\IdeaController@destroy')->name('admin.idea.destroy');
    Route::post('idea/{id}/approve', 'Admin\IdeaController@approve')->name('admin.idea.approve');
});


Route::prefix('api')->group(function () {
    Route::get('/profiles', 'ProfileController@apiProfiles');
    Route::get('/startups', 'StartupController@apiStartups');
    Route::get('/ideas', 'IdeaController@indexApi');
});

Route::resource('/blog', 'PostController');
//Route::post('/icomment/create/{id}', 'CommentController@store')->name('comment.store');

Auth::routes();



//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
