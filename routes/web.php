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

Route::get('/', 'PagesController@welcome');

Route::get('/items', 'ItemsController@index');
Route::get('/items/{item}', 'ItemsController@show');
Route::get('/items/{item}/edit', 'ItemsController@edit');
Route::patch('/items/{item}', 'ItemsController@update');
Route::get('/items/{item}/remove', 'ItemsController@remove');
Route::delete('/items/{item}', 'ItemsController@delete');
Route::get('/additem', 'ItemsController@add');
Route::post('/items', 'ItemsController@store');

Route::get('/users', 'UsersController@index');
Route::get('/users/{user}', 'UsersController@show');
Route::get('/settings', 'UsersController@settings');
Route::post('/settings/changepassword', 'UsersController@changepassword');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});
