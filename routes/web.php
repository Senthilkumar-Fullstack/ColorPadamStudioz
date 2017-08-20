<?php

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
    //return view('welcome')->with('name', 'Senthil');
    return View::make('pages.home');
    
});

Route::get('/home', function () {
    //return view('welcome')->with('name', 'Senthil');
    return View::make('pages.home');
    
});

Route::get('galleries', function () {
    return View::make('pages.galleries');
    
});


#Admin
Route::group(['prefix' => 'admin/'], function () {
    Route::get('/', function(){
        return view('admin');
    });
});

# Promotions
Route::group(['prefix' => 'post/'], function () {
    Route::get('/promotions', [
        'uses' => 'Admin\PromotionsController@getAllPromotionsWithCategory'
    ]);
});