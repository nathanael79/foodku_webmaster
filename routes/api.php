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

Route::get("/login","API\ApiLoginController@viewAll");
Route::post("/login","API\ApiLoginController@create");
Route::put("/login/{id}","API\ApiLoginController@update");
Route::delete("/login/{id}","API\ApiLoginController@delete");