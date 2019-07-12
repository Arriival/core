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
Route::resource('home', 'ActionController');
Route::resource('personnel', 'BasePersonController');


Route::get('form', function(){
    return View::make('layouts.FileUpload');
});

Route::any('form-submit', function(){
    var_dump(Input::file('file'));
});
