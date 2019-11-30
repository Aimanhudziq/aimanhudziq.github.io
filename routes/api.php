<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'maybank'], function()
{
    Route::get('/','CardApplicationController@viewAllBankBranch');
    //Route::post('/addCardApplication','CardApplicationController@addApplication');
});