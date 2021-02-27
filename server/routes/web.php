<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth.very_basic'], function () {
    Route::get('/', 'ApplicationController@showApplications')->name('top');
    Route::get('apps/{app}', 'ApplicationController@showAppDetail')->name('app');

    Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->where('social', 'twitter|google');
    Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|google');

    // users page
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/{name}', 'UserController@show')->name('show');
        Route::get('/{name}/likes', 'UserController@likes')->name('likes');
        Route::get('/{name}/followings', 'UserController@followings')->name('followings');
        Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    });

    Route::group(['middleware' => 'auth'], function () {
        // todo division
        Route::get('/todo', 'HomeController@index')->name('todo');
        Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
        Route::post('/folders/create', 'FolderController@create');
        Route::get('/folders/{folder}/edit', 'FolderController@showEditForm')->name('folders.edit');
        Route::post('/folders/{folder}/edit', 'FolderController@edit');
        Route::delete('/folders/{folder}/tasks', 'FolderController@destroy')->name('folders.destroy');

        // posts_app division
        Route::get('/admin/app_index', 'AdminController@index')->name('admin.index');
        Route::get('/posts_app', 'ApplicationController@showApplicationForm')->name('posts.app');
        Route::post('/posts_app', 'ApplicationController@postApplication');
        Route::get('/posts_app/edit/{app}', 'ApplicationController@showApplicationEditForm')->name('app.edit');
        Route::post('posts_app/edit/{app}', 'ApplicationController@editApplication');
        Route::delete('apps/{app}', 'ApplicationController@destroy')->name('apps.destroy');

        // likes
        Route::prefix('apps')->name('apps.')->group(function () {
            Route::put('/{app}/like', 'ApplicationController@like')->name('like');
            Route::delete('/{app}/like', 'ApplicationController@unlike')->name('unlike');
        });

        // Follow Unfollow
        Route::prefix('users')->name('users.')->group(function () {
            Route::put('/{name}/follow', 'UserController@follow')->name('follow');
            Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
        });


        Route::group(['middleware' => 'can:view,folder'], function () {
            Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');
            Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
            Route::post('/folders/{folder}/tasks/create', 'TaskController@create');
            Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
            Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');
            Route::delete('/folders/{folder}/tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');
        });

        Route::prefix('mypage')
            ->namespace('MyPage')
            ->group(function () {
                Route::get('edit-profile', 'ProfileController@showProfileEditForm')->name('mypage.edit-profile');
                Route::post('edit-profile', 'ProfileController@editProfile');
            });
    });


    Auth::routes();
});
