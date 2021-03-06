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



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function(){
    // Route::get('auth/twitter', 'Auth\SocialAuthController@redirectToProvider');
    // Route::get('auth/twitter/callback', 'Auth\SocialAuthController@handleProviderCallback');
    // Route::get('auth/twitter/logout', 'Auth\SocialAuthController@logout');

    Route::resource('articles', 'Api\ArticlesController', ['except' => ['create', 'edit']]);
    Route::resource('runners', 'Api\RunnersController', ['except' => ['create', 'edit']]);
    Route::resource('raceresult', 'Api\RaceResultsController', ['except' => ['create', 'update', 'edit']]);
    Route::resource('achievement', 'Api\AchievementController', ['except' => ['create', 'update', 'edit']]);
});