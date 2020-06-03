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
Route::get('/', 'UserController@getGroup')->middleware('auth')->name('home');

Route::group(['prefix'=>'user', 'middleware'=>'auth'], function(){
    Route::get('/config', 'UserController@config');
    Route::put('/config/{id}', 'UserController@update');
    Route::get('/avatar/{filename}', 'UserController@getAvatar');
    Route::post('/profile', 'UserController@usersearch');

});

Route::group(['prefix'=>'group', 'middleware'=>'auth'], function(){
    Route::get('/create', 'GroupController@create');
    Route::post('/create', 'GroupController@save');
    Route::get('/config/{id}', 'GroupController@config');
    Route::put('/config/{id}', 'GroupController@update');
    Route::get('/delete/{id}', 'GroupController@delete');
    Route::get('/boards/{id}', 'GroupController@getBoards');
    Route::get('/add/{id}', 'GroupController@add')->name('add');
    Route::post('/userlist/{id}', 'GroupController@usersearch')->name('userlist');
    Route::get('/adduser/{id_user}/{id_group}', 'GroupController@adduser')->name('adduser');
});

Route::group(['prefix'=>'board', 'middleware'=>'auth'], function(){
    Route::get('/create/{id}', 'BoardController@create');
    Route::post('/create', 'BoardController@save');
    Route::get('/config/{id}', 'BoardController@config');
    Route::put('/config/{id}', 'BoardController@update');
    Route::get('/delete/{id}', 'BoardController@delete');
    Route::get('/notes/{id}', 'BoardController@getNotes');
});

Route::group(['prefix'=>'note', 'middleware'=>'auth'], function(){
    Route::get('/create/{id}', 'NoteController@create');
    Route::post('/create', 'NoteController@save');
    Route::get('/config/{id}', 'NoteController@config');
    Route::put('/config/{id}', 'NoteController@update');
    Route::get('/delete/{id}', 'NoteController@delete');
    Route::get('/image/{filename}', 'NoteController@getImage');
});