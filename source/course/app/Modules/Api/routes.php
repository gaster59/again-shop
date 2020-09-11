<?php

Route::group([
    'module' => 'Api',
    'prefix' =>  'api/v1',
    'namespace' => 'App\Modules\Api\Controllers'
], function(){
    Route::get('blogs', 'BlogsController@index')->name('api.get.blogs');
});