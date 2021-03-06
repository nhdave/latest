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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('categories/createSub/{parentId}', 'CategoryController@createSub');

Route::resource('categories', 'CategoryController');
Route::resource('links', 'LinkController');
Route::resource('credentials', 'CredentialController');
Route::resource('projects', 'ProjectController');
Route::resource('updates', 'UpdateController');
Route::resource('articles', 'ArticleController');
