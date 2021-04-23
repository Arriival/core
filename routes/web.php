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
    return view('/auth/login');
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


Route::resource('note', 'NoteController');


Route::prefix('subject')->group(function () {
    Route::get('getAll', 'SubjectController@getAll')->name('subject.getAll');
});
Route::resource('subject', 'SubjectController');


Route::prefix('topic')->group(function () {
    Route::get('getAll/{id}', 'TopicController@getAll')->name('topic.getAll');
});
Route::resource('topic', 'TopicController');


Route::prefix('dailyBook')->group(function () {
    Route::get('report', 'DailyBookController@getReport')->name('dailyBook.report');
    Route::get('updateRemaining/{topicId}', 'DailyBookController@updateRemaining')->name('dailyBook.updateRemaining');
});
Route::resource('dailyBook', 'DailyBookController');




