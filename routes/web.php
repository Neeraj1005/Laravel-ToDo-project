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

// Route::get('/list', function () {
//     return view('list');
// });

// Route::resource('/list','listController');
Route::get('/list','TodoListController@index');
// for edit
Route::post('/list','TodoListController@create');
// for delete
Route::post('/delete','TodoListController@delete');
// for update
Route::post('/update','TodoListController@update');

// for search Box
Route::get('/search','TodoListController@search')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
