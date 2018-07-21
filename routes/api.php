<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiresource('/prodects','ProdectController');

Route::group(['prefix'=>'prodects'],function(){

	Route::apiresource('/{prodects}/reviews','ReviewController');

});