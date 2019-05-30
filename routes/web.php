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

//Route::get('/', function () {
//    $profiles = count(\App\Profile::all());
//    $startups = count(\App\Startup::all());
//    $posts = count(\App\Models\Post::all());
//    return view('welcome', compact('profiles', 'startups', 'posts'));
//});
//


Route::get('/payment', function () {
    $profiles = count(\App\Profile::all());
    return view('payment', compact('profiles'));
})->name('payment');

Route::get('/about/payment', function () {
    return view('for_payment');
})->name('about.payment');

Route::prefix('api')->group(function () {
    Route::get('/status', 'StartupController@userStatus');
    Route::get('/profiles', 'ProfileController@getProfiles');
    Route::get('/profile/skills/{id}', 'ProfileController@profileSkills');
    Route::get('/profile/professions/{id}', 'ProfileController@profileProfessions');
    Route::get('/skills', 'ProfileController@skills');
    Route::get('/professions', 'ProfileController@professions');
    Route::get('/posts/top', 'PostController@topPosts');
    Route::get('/startups/top', 'StartupController@topStartups');
    Route::get('/startups/favorite', 'StartupController@favoriteStartups');
    Route::post('startup/{id}/like', 'StartupController@like')->name('startup.like');
    Route::get('/ideas', 'IdeaController@indexApi');
    Route::get('/post/tags', 'PostController@tags');
    Route::get('/startups/my', 'StartupController@getMyStartups');

});



Route::get('/', 'StartupController@index')->name('startup.index');

Route::group(['prefix' => '/startup'], function () {
    Route::get('/{id}', 'StartupController@show')->name('startup.show')->where('id', '[0-9]+');
});



Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => '/startup'], function () {
        Route::get('/mystartups', 'StartupController@myStartups')->name('startup.my_startups');
        Route::get('/{id}', 'StartupController@show')->name('startup.show')->where('id', '[0-9]+');
        Route::get('/create', 'StartupController@create')->name('startup.create');
        Route::post('/', 'StartupController@store')->name('startup.store');
        Route::post('/comment/create/{id}', 'StartupController@storeComment')->name('startup.comment.store');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::group(['middleware' => 'pay'], function (){
            Route::get('/', 'ProfileController@index')->name('profile.index');
            Route::get('/{id}/show', 'ProfileController@showProfile')->name('profile.showProfile');
            Route::post('/{id}/like', 'ProfileController@like')->name('profile.like');
        });
        Route::get('/create', 'ProfileController@create')->name('profile.create');
        Route::post('/', 'ProfileController@store')->name('profile.store');
        Route::get('/{id}', 'ProfileController@show')->name('profile.show');
    });

//    Route::group(['prefix' => 'post'], function () {
//        Route::get('/', 'PostController@index')->name('post.index');
//        Route::get('/create', 'PostController@create')->name('post.create');
//        Route::post('/', 'PostController@store')->name('post.store');
//        Route::post('/{id}/comment', 'PostController@commentStore')->name('post.comment.store');
//    });


//    Route::prefix(['idea'], function () {
//        Route::get('/', 'IdeaController@index')->name('idea.index');
//        Route::get('/create', 'IdeaController@create')->name('idea.create');
//        Route::get('/{idea}', 'IdeaController@show')->name('idea.show');
//        Route::post('/', 'IdeaController@store')->name('idea.store');
//        Route::post('/{id}/like', 'IdeaController@like')->name('idea.like');
//        Route::post('/comment/create/{id}', 'ICommentController@store')->name('icomment.store');
//    });
});

//
//Route::get('/role', 'Admin\RoleController@index');
//Route::get('/role/create', 'Admin\RoleController@create');
//Route::post('/role', 'Admin\RoleController@store')->name('admin.role.store');
//
//Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
//    Route::get('idea', 'Admin\IdeaController@index')->name('admin.idea.index');
//    Route::patch('idea/{idea}', 'Admin\IdeaController@update')->name('admin.idea.update');
//    Route::get('idea/{idea}', 'Admin\IdeaController@edit')->name('admin.idea.edit');
//    Route::delete('idea/{idea}', 'Admin\IdeaController@destroy')->name('admin.idea.destroy');
//    Route::post('idea/{id}/approve', 'Admin\IdeaController@approve')->name('admin.idea.approve');
//});

Route::group(['prefix' => 'auth'], function () {
    Route::get('/', 'Auth\LoginController@show')->name('auth');
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('auth.provider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});


//Route::get('post/{id}', 'PostController@show')->name('post.show');

Auth::routes();


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
