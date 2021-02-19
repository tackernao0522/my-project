<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ApplicationController@showApplications')->name('top');

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->where('social', 'twitter|google');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|google');

Route::group(['middleware' => 'auth'], function () {
    // todo division
    Route::get('/todo', 'HomeController@index')->name('todo');
    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');
    Route::get('/folders/{folder}/edit', 'FolderController@showEditForm')->name('folders.edit');
    Route::post('/folders/{folder}/edit', 'FolderController@edit');
    Route::delete('/folders/{folder}/tasks', 'FolderController@destroy')->name('folders.destroy');
    Route::get('/admin/app_index', 'AdminController@index')->name('admin.index');
    Route::get('/posts_app', 'ApplicationController@showApplicationForm')->name('posts.app');
    Route::post('/posts_app', 'ApplicationController@postApplication');
    Route::delete('apps/{app}', 'ApplicationController@destroy')->name('apps.destroy');

    Route::group(['middleware' => 'can:view,folder'], function () {
        Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');
        Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
        Route::post('/folders/{folder}/tasks/create', 'TaskController@create');
        Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
        Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');
        Route::delete('/folders/{folder}/tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');
    });
});


Auth::routes();
