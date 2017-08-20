<?php

use Illuminate\Http\Request;

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

Route::post('/sendemail', 'EmailController@send');
Route::get('/send', 'EmailController@mail');
Route::post('/sendTourQuote', 'EmailController@sendTourQuote');

#API
Route::group(['prefix' => 'v1/'], function () {

    #login api
    Route::post('login', [
    	'uses' => 'Admin\UserController@login'
    ]);

    #logout api
    Route::get('logout', [
		'middleware' => ['auth:api'],
		'uses' => 'Admin\UserController@logout'
    ]);

    #user register
    Route::post('user-register', [
		'uses' => 'Admin\UserController@userRegister'
    ]);

    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('/user', [
        	'uses' => 'Admin\UserController@userDetails'
        ]);

        # Promotion Categories
        Route::get('/promotion-categories', [
            'uses' => 'Admin\PromotionCategoriesController@get'
        ]);
        Route::post('/promotion-categories', [
            'uses' => 'Admin\PromotionCategoriesController@store'
        ]);
        Route::get('/promotion-categories/{category_id}', [
            'uses' => 'Admin\PromotionCategoriesController@getByID'
        ]);
        Route::patch('/promotion-categories/{category_id}', [
            'uses' => 'Admin\PromotionCategoriesController@updateByID'
        ]);
        Route::delete('/promotion-categories/{category_id}', [
            'uses' => 'Admin\PromotionCategoriesController@deleteByID'
        ]);

        # Promotions
        Route::get('/promotions', [
            'uses' => 'Admin\PromotionsController@get'
        ]);
        Route::post('/promotions', [
            'uses' => 'Admin\PromotionsController@store'
        ]);
        Route::get('/promotions/{promotion_id}', [
            'uses' => 'Admin\PromotionsController@getByID'
        ]);
        Route::post('/promotions/{promotion_id}', [
            'uses' => 'Admin\PromotionsController@updateByID'
        ]);
        Route::delete('/promotions/{promotion_id}', [
            'uses' => 'Admin\PromotionsController@deleteByID'
        ]);
    });

});

#Admin
/*Route::group(['prefix' => 'admin/'], function () {
    Route::get('/', function(){
        return view('admin');
    });
});*/