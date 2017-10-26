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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('profile')->group(function () {
    Route::get('edit', 'ProfileController@edit')->name('プロフィール編集画面');
    Route::put('update', 'ProfileController@update')->name('プロフィール更新');
});
