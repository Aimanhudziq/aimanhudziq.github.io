<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'maybank'], function()
{
    Route::get('/','CardApplicationController@index');
    Route::get('/view_all_branches/{bank_code}','CardApplicationController@viewAllBankBranch');
    Route::get('/newcardapplication/{name}/{ic}/{phone_no}/{branch_code}/{image_url}','CardApplicationController@addCardApplication');
    Route::get('/submit_card_application','CardApplicationController@submitCardApplication')->name('submit_card_app');
});