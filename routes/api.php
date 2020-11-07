<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function () {
    Route::prefix('user')->group(function () {
        Route::post('login', 'ApiController@login');
    });

    // USERS
    Route::prefix('user')->middleware('auth:api')->group(function () {
        Route::get('/profile', 'ApiController@profile');
        Route::get('/logout', 'ApiController@logout');
        Route::post('/update', 'ApiController@updateInfo');
        Route::post('/updatePassword', 'ApiController@updatePassword');
    });

    Route::post('/forgot', 'ApiController@forgot');

    // LISTS
    Route::prefix('lists')->middleware('auth:api')->group(function () {
        Route::get('/', 'ApiController@index');
        Route::post('/{id}/statue', 'ApiController@statue');
        Route::get('/create', 'ApiController@create');
        Route::post('/store', 'ApiController@store');
        Route::get('/{id}/edit', 'ApiController@edit');
        Route::post('/{id}/update', 'ApiController@update');
    });
});
