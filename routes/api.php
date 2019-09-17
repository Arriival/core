<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::POST('/login', function (Request $request) {
//    if ($request->username == "admin" and $request->password == "admin") {
    return "eyJpdiI6Ilg4MnRTTCs5REJwUldLa0VaUlh6cXc9PSIsInZhbHVlIjoiRnEySW";
//    }


});
