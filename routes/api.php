<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'maybank'], function()
{
    Route::get('/','CardApplicationController@addApplication');
    //Route::post('/addCardApplication','CardApplicationController@addApplication');
});