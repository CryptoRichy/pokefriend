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

Route::get('/', 'IndexController@index');

Route::group(['middleware' => 'usercheck'] , function () {
    Route::get('friend', 'IndexController@friend');

    Route::group(['prefix' => 'char'] , function() {
        Route::get('list' , 'CharController@list');
        Route::post('add', 'CharController@store');
        Route::get('add' , 'CharController@create');
        Route::post('edit/{id}' , 'CharController@update');
        Route::get('edit/{id}' , 'CharController@edit');
        Route::post('delete' , 'CharController@delete');
    });

    Route::get('logout' , function() {
        Auth::logout();
        return redirect('/');
    });
});

Route::get('privacy', 'IndexController@privacy');

Route::get('/auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');