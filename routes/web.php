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
    Route::get('test' , function() {
        return 'You are login as: '.Auth::user()['name'];
    });

    Route::post('char/add' , 'IndexController@charAddPost');
    Route::get('char/add' , 'IndexController@charAdd');

    Route::get('char/list' , 'IndexController@charList');
    

    Route::get('logout' , function() {
        Auth::logout();
        return redirect('/');
    });
});

Route::get('facebook', function () {
    return view('facebook');
});
Route::get('/auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');