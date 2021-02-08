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
})->name('top');

// todo division
Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
Route::post('/folders/create', 'FolderController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
