<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('temp', "LoginController@temp")->name('admin.login.temp');
        Route::get('login', "LoginController@index")->name('admin.login.index');
        Route::post('doLogin', "LoginController@login")->name('admin.doLogin.index');

        Route::get('dashboard', "DashboardController@index")->name('admin.dashboard.index');

        Route::get('category', "CategoryController@index")->name('admin.category.index');
        Route::get('category/add', "CategoryController@add")->name('admin.category.add');
        Route::post('category/doAdd', "CategoryController@store")->name('admin.category.doAdd');
        Route::get('category/edit/{id}', "CategoryController@edit")->name('admin.category.edit');
        Route::post('category/edit/{id}', "CategoryController@update")->name('admin.category.doEdit');
        Route::delete('category/delete/{id}', "CategoryController@delete")->name('admin.category.delete');

        Route::get('product', "ProductController@index")->name('admin.product.index');

        Route::get('blog', "BlogController@index")->name('admin.blog.index');
    });
});
