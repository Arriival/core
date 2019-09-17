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

/*Route::post('/api/login', function (\Request $request) {
    \Illuminate\Support\Facades\Log::alert("mahdi");
    return ($request->username);

//    \Illuminate\Support\Facades\Log::alert($request->json());


    return "eyJpdiI6Ilg4MnRTTCs5REJwUldLa0VaUlh6cXc9PSIsInZhbHVlIjoiRnEySWcwNWxmSTlMbVhFQkFRaFNQMmkxaVp3Qnd1M2FcL3BiMWQ5NDVJeHFDVmlxTlZITHhLYzRKUnZxWnZpUGgiLCJtYWMiOiI5YjZmN2RhYzNiZTMzZTkyOWI0MTJhMTUyYjZiNmQzYTY3OTU5ZWFjMzM3NjFkZjVhNzM2YzQzYzAwMjhhNTM0In0";
});*/

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
});
Route::resource('user', 'UserController');

//role
Route::resource('role', 'RoleController');
Route::resource('role.search', 'RoleController@search');


