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
Route::post('token', ['as' => 'token','uses' => 'LoginController@token']);
Route::post('refresh', ['as' => 'refresh','uses' => 'LoginController@refresh']);

Route::group(['middleware' => ['auth:admin']], function () {
    Route::post('logout', ['as' => 'logout','uses' => 'LoginController@logout']);
    Route::post('userinfo', ['as' => 'userinfo','uses' => 'IndexController@userinfo']);

    Route::group(['prefix' => 'system', 'as' => 'system.', 'namespace' => 'System'], function () {
        Route::group(['prefix' => 'develop', 'as' => 'develop.', 'namespace' => 'Develop'], function () {
            Route::post('permission', ['as' => 'permission','uses' => 'PermissionController@index']);
            Route::post('permission/create', ['as' => 'permission.create','uses' => 'PermissionController@create']);
            Route::post('permission/update/{model}', ['as' => 'permission.update','uses' => 'PermissionController@update']);
            Route::post('permission/delete/{model}', ['as' => 'permission.delete','uses' => 'PermissionController@delete']);
        });

    });
});
