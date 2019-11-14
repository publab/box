<?php

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

//index
Route::get('/', ['as' => 'index','uses' => 'IndexController@index']);

//邮件实例
Route::get('mail', ['as' => 'mail','uses' => 'IndexController@mail']);

//token
Route::get('token', ['as' => 'token','uses' => 'IndexController@token']);

Route::group(['middleware' => ['auth:admin']], function () {
    Route::any('userinfo', ['as' => 'userinfo','uses' => 'IndexController@userinfo']);
});
