<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    dd($request);
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
    Route::post('/login', "LoginController@index")->name('api.index');

    Route::get('/test', "LoginController@test")->name('api.test')
        ->middleware('basic.auth');

    Route::post('/test', "LoginController@post")->name('api.post')
        ->middleware(['basic.auth', 'cors']);
});
