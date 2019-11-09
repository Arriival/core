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

//home
Route::resource('home', 'ActionController');

//personnel
Route::prefix('personnel')->group(function () {
    Route::get('select', 'BasePersonController@list')->name('personnel.list');
});
Route::resource('personnel', 'BasePersonController');

Auth::routes();

//user
Route::prefix('user')->group(function () {
    Route::get('personnel', 'UserController@showPersonList')->name('user.personnel');
    Route::get('changeStatus/{id}', 'UserController@changeStatus')->name('user.status');
});
Route::resource('user', 'UserController');

//role
Route::resource('role', 'RoleController');
Route::resource('role.search', 'RoleController@search');


