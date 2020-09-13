<?php

Route::group([
    'module' => 'Api',
    'prefix' =>  'api/v1',
    'namespace' => 'App\Modules\Api\Controllers'
], function(){
    Route::get('blogs', 'BlogsController@index')->name('api.get.blogs');
    Route::get('newsletter', 'NewsletterController@index')->name('api.get.newsletter');
    Route::post('newsletter/add', 'NewsletterController@add')->name('api.post.newsletter.add');
});