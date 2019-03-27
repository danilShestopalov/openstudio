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

Route::resource('/blog', 'PostController');
Route::post('/blog/{id}/comment', 'CommentController@store')->name('comment.store');
Route::get('/investor', function () {
    return view('investor');
});


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'startup'], function () {
        Route::post('/comment/create/{id}', 'StartupController@storeComment')->name('startup.comment.store');
    });

    Route::resource('/startup', 'StartupController');

    Route::prefix(['idea'], function () {
        Route::get('/', 'IdeaController@index')->name('idea.index');
        Route::get('/create', 'IdeaController@create')->name('idea.create');
        Route::get('/{idea}', 'IdeaController@show')->name('idea.show');
        Route::post('/', 'IdeaController@store')->name('idea.store');
        Route::post('/{id}/like', 'IdeaController@like')->name('idea.like');
        Route::post('/comment/create/{id}', 'ICommentController@store')->name('icomment.store');
    });

//    Route::resource('profile', 'ProfileController');
});




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
    Route::get('/posts/top', 'PostController@topPosts');
    Route::get('/startups/top', 'StartupController@topStartups');
    Route::post('startup/{id}/like', 'StartupController@like');
    Route::get('/ideas', 'IdeaController@indexApi');
});


Auth::routes();



//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
