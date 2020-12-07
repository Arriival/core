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

Route::POST('/hrm/rest/usermanagement/login', function (Request $request) {
    $bodyContent = $request->getContent();
    \Illuminate\Support\Facades\Log::alert($bodyContent);
    if ($request->username == "admin" and $request->password == "admin") {
        return "eyJpdiI6Ilg4MnRTTCs5REJwUldLa0VaUlh6cXc9PSIsInZhbHVlIjoiRnEySW";
    }
});
Route::POST('/hrm/rest/education/courses', function (Request $request) {
    \Illuminate\Support\Facades\Log::alert($request->header('key'));
    \Illuminate\Support\Facades\Log::alert($request->all());
    return 201;
});
Route::POST('/hrm/rest/bazresi/getPersonelList', function (Request $request) {
    class Person
    {
//
    }

    for ($i = 0; $i < 1; $i++) {
        $obj = new Person();
//        $obj->personelCode = mt_rand(10000000, 99999999);
        $obj->nationalNumber = mt_rand(100000000, 999999999);
        $obj->none = $request->get('username');
        $obj->key = $request->get('key');
        $obj->firstName = "نام";
        $obj->lastName = "نام خانوادگی";
        $obj->fatherName = "پدر";
        $obj->codeEnfesal = 10; //mt_rand(1000, 9999);
        $obj->rastetapesh = 11; //mt_rand(1000, 9999);
        $obj->ozviat = 11;//mt_rand(1000, 9999);
        $obj->tarikh_ozviyat = mt_rand(1358, 1398) . "/" . mt_rand(1, 12) . "/" . mt_rand(1, 30);
        $obj->recDate = mt_rand(1358, 1398) . "/" . mt_rand(1, 12) . "/" . mt_rand(1, 30);
        $obj->darsadJanbazi = mt_rand(5, 70);
        $obj->moblileNumber = "0912" . mt_rand(0000000, 9999999);
        $obj->codeYegan = "000"; //"000000000000000" . mt_rand(10000000, 99999999);
        $obj->code_post = "500";// mt_rand(10000000, 99999999);
        $obj->yeganMamuriati = "000";// "000000000000000" . mt_rand(10000000, 99999999);
        $obj->mahalMamuriat = "500";//mt_rand(10000000, 99999999);
        $obj->reshtehTahsili = 281; // mt_rand(10000000, 99999999);
        $obj->mahalEskan = 4;// mt_rand(1000, 9999);
        $obj->code_dore = 123;
        $obj->jensiyat = mt_rand(1, 2);
        $obj->taahol = 1;
        $obj->daraje = 0;// mt_rand(1000, 9999);
        $obj->jaygah_Daraje = 0;// mt_rand(1000, 9999);
        $array[] = $obj;
    }

    return json_encode($array);
});
