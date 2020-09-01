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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' => 'Front'], function () {
    $suffix = '.html';
    Route::get('/', "ShopController@index")->name('shop.index');
    Route::get('/category/{id}-{name}'.$suffix, "ShopController@category")->name('shop.category.id');
    Route::get('/product/{id}-{name}'.$suffix, "ShopController@product")->name('shop.product.id');
    Route::get('/search'.$suffix, "ShopController@search")->name('shop.search');
    Route::get('/blog'.$suffix, "ShopController@blog")->name('shop.blog');
    Route::get('/blog/{id}-{name}'.$suffix, "ShopController@blog")->name('shop.blog.detail');
    Route::get('/contact'.$suffix, "ShopController@contact")->name('shop.contact');
    Route::post('/contact'.$suffix, "ShopController@storeContact")->name('shop.contact.storeContact');
    Route::get('/sitemap'.$suffix, "SitemapController@siteMap")->name('shop.sitemap');
    Route::get('/cart'.$suffix, "CartController@index")->name('shop.cart.index');
    Route::post('/addToCart'.$suffix, "CartController@addToCart")->name('shop.cart.addToCart');
    Route::post('/updateToCart'.$suffix, "CartController@updateToCart")->name('shop.cart.updateToCart');
    Route::get('/view_cart'.$suffix, "CartController@viewCart")->name('shop.cart.viewCart');

    Route::get('/checkout'.$suffix, "CheckoutController@index")->name('shop.checkout.index');
    Route::post('/checkout'.$suffix, "CheckoutController@store")->name('shop.checkout.store');
});

Route::get('admin/login', "Admin\LoginController@index")->name('admin.login.index');
Route::post('admin/doLogin', "Admin\LoginController@login")->name('admin.doLogin.index');
Route::get('admin/logout', "Admin\LoginController@logout")->name('admin.logout.index');
Route::get('admin/temp', "Admin\LoginController@temp")->name('admin.login.temp');

// Route::group(['namespace' => 'Admin', 'middleware'=>'admin.authen:admin'], function () {
Route::group(['namespace' => 'Admin', 'middleware'=>'admin.authen:admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', "DashboardController@index")->name('admin.dashboard.index');

        Route::get('category', "CategoryController@index")->name('admin.category.index');
        Route::get('category/add', "CategoryController@add")->name('admin.category.add');
        Route::post('category/doAdd', "CategoryController@store")->name('admin.category.doAdd');
        Route::get('category/edit/{id}', "CategoryController@edit")->name('admin.category.edit');
        Route::post('category/edit/{id}', "CategoryController@update")->name('admin.category.doEdit');
        Route::get('category/delete/{id}', "CategoryController@delete")->name('admin.category.delete');

        Route::get('product', "ProductController@index")->name('admin.product.index');
        Route::get('product/add', "ProductController@add")->name('admin.product.add');
        Route::post('product/doAdd', "ProductController@store")->name('admin.product.doAdd');
        Route::get('product/edit/{id}', "ProductController@edit")->name('admin.product.edit');
        Route::post('product/edit/{id}', "ProductController@update")->name('admin.product.doEdit');
        Route::get('product/delete/{id}', "ProductController@delete")->name('admin.product.delete');
        Route::get('product/{id}/add-image', "ProductController@addImage")->name('admin.product.add.image');
        Route::post('product/{id}/add-image', "ProductController@storeImage")->name('admin.product.add.doimage');
        Route::post('product/delete-image', "ProductController@deleteImage")->name('admin.product.add.deleteimage');

        Route::get('blog', "BlogController@index")->name('admin.blog.index');
        Route::get('blog/add', "BlogController@add")->name('admin.blog.add');
        Route::post('blog/doAdd', "BlogController@store")->name('admin.blog.doAdd');
        Route::get('blog/edit/{id}', "BlogController@edit")->name('admin.blog.edit');
        Route::post('blog/edit/{id}', "BlogController@update")->name('admin.blog.doEdit');
        Route::get('blog/delete/{id}', "BlogController@delete")->name('admin.blog.delete');

        Route::get('contact', "ContactController@index")->name('admin.contact.index');
        Route::get('contact/{id}/response', "ContactController@response")->name('admin.contact.response');
        Route::post('contact/{id}/response', "ContactController@responseMessage")->name('admin.contact.response.message');
        Route::get('contact/delete/{id}', "ContactController@delete")->name('admin.contact.delete');

        Route::get('profile', "ProfileController@index")->name('admin.profile.index');
        Route::post('profile', "ProfileController@renewPassword")->name('admin.profile.renewpassword');

        Route::post('uploader/save-image', "UploaderController@saveImage")->name('admin.uploader.saveImage');
    });
});
