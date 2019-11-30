<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'maybank'], function()
{
    Route::get('/','CardApplicationController@index');
    Route::get('/view_all_branches','CardApplicationController@viewAllBankBranch');
    Route::get('/url','CardApplicationController@getUrl');
});