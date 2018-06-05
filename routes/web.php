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

//Auth::routes();

Route::get('/register',[
    "uses"=>'Auth\RegisterController@index',
    "as"=>"register"
]);

Route::post('/register',[
    "uses"=>'Auth\RegisterController@registeruser',
    "as"=>"register"
]);

Route::get('/login', [
    'uses' => 'Auth\LoginController@index',
    'as' => 'login'
]);

Route::post('/login',[
    "uses"=>'Auth\LoginController@login',
    'as'=>'login.post'
]);

Route::get('/home',[
   'uses'=>'HomeController@index',
   'as'=>'home',
]);

Route::post('/logout',[
    "uses"=>'Auth\LoginController@logout',
    "as"=>"logout",
]);

Route::get('/database/makanan',[
    "uses" => 'MakananController@index',
    "as"=>"database.makanan",
]);

Route::get('/database/minuman',[
    "uses" => 'MinumanController@index',
    "as"=>"database.minuman",
]);

Route::get('/database/user',[
    "uses" => 'UserController@index',
    "as"=>"database.user",
]);
