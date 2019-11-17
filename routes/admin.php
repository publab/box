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


Route::options('/{all}', function() { return \Response::make('', 200, ['Access-Control-Allow-Headers'=> '*']); })->where(['all' => '.+']);
//index
Route::get('/', ['as' => 'index','uses' => 'IndexController@index']);

//邮件实例
Route::get('mail', ['as' => 'mail','uses' => 'IndexController@mail']);

//token
Route::post('token', ['as' => 'token','uses' => 'IndexController@token']);

Route::group(['middleware' => ['auth:admin']], function () {
    //获取用户信息
    Route::post('userinfo', ['as' => 'userinfo','uses' => 'IndexController@userinfo']);
    //获取分类
    Route::post('category', ['as' => 'category','uses' => 'IndexController@category']);

    //文章列表
    Route::get('list', ['as' => 'list','uses' => 'IndexController@list']);

    //文章详情
    Route::get('detail/{id}', ['as' => 'detail','uses' => 'IndexController@detail']);

    //添加文章
    Route::post('list/create', ['as' => 'list.create','uses' => 'IndexController@create']);

    //修改文章
    Route::post('list/update/{id}', ['as' => 'list.update','uses' => 'IndexController@update']);

});
