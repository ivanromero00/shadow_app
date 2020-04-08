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

Auth::routes();
Route::get('/', 'UserController@getGroup')->middleware('auth');

Route::group(['prefix'=>'user', 'middleware'=>'auth'], function(){
    Route::get('/config', 'UserController@config');
    Route::put('/config', 'UserController@update');
});

Route::group(['prefix'=>'group', 'middleware'=>'auth'], function(){
    Route::get('/create', 'GroupController@create');
    Route::post('/create', 'GroupController@save');
    Route::get('/config/{id}', 'GroupController@config');
    Route::put('/config/{id}', 'GroupController@update');
    Route::get('/delete/{id}', 'GroupController@delete');
});
