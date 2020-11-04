<?php

use Illuminate\Support\Facades\Route;


/*

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
*/





Auth::routes();

Route::post('/attempt', 'Auth\LoginController@attempt')->name('attempt');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['prefix' => '/dashboard', 'as' => 'dashboard.' ], function () {


        // users 
        Route::group(['prefix' => '/users', 'as' => 'users.' ], function () {
            Route::get('/', 'UsersController@index')->name('index');
            Route::get('/create', 'UsersController@create')->name('create');
            Route::post('/store', 'UsersController@store')->name('store');
            Route::get('/edit', 'UsersController@edit')->name('edit');
            Route::post('/update', 'UsersController@update')->name('update');
            Route::get('/delete', 'UsersController@delete')->name('delete');
            Route::get('/updatePassword', 'UsersController@updatePassword')->name('updatePassword');
        });


        // products 
        Route::group(['prefix' => '/products', 'as' => 'products.' ], function () {
            Route::get('/', 'ProductsController@index')->name('index');
            Route::get('/create', 'ProductsController@create')->name('create');
            Route::post('/store', 'ProductsController@store')->name('store');
            Route::get('/edit', 'ProductsController@edit')->name('edit');
            Route::post('/update', 'ProductsController@update')->name('update');
            Route::get('/delete', 'ProductsController@delete')->name('delete');
        });


        // cities 
        Route::group(['prefix' => '/cities', 'as' => 'cities.' ], function () {
            Route::get('/', 'CitiesController@index')->name('index');
            Route::get('/create', 'CitiesController@create')->name('create');
            Route::post('/store', 'CitiesController@store')->name('store');
            Route::get('/edit', 'CitiesController@edit')->name('edit');
            Route::post('/update', 'CitiesController@update')->name('update');
            Route::get('/delete', 'CitiesController@delete')->name('store');
        });


        // stock 
        Route::group(['prefix' => '/stock', 'as' => 'stock.' ], function () {
            Route::get('/', 'StockController@index')->name('index');
            Route::get('/create', 'StockController@create')->name('create');
            Route::post('/store', 'StockController@store')->name('store');
            Route::get('/edit', 'StockController@edit')->name('edit');
            Route::post('/update', 'StockController@update')->name('update');
            Route::get('/delete', 'StockController@delete')->name('store');
        });


        // lists 
        Route::group(['prefix' => '/listing', 'as' => 'listing.' ], function () {
            Route::get('/', 'ListingController@index')->name('index');
            Route::get('/create', 'ListingController@create')->name('create');
            Route::post('/store', 'ListingController@store')->name('store');
            Route::get('/edit', 'ListingController@edit')->name('edit');
            Route::post('/update', 'ListingController@update')->name('update');
            Route::post('/delete', 'ListingController@delete')->name('delete');
            Route::post('/destroy', 'ListingController@destroy')->name('destroy');
            Route::post('/assign', 'ListingController@assign')->name('assign');
            Route::post('/restore', 'ListingController@restore')->name('restore');
            Route::post('/export', 'ListingController@export')->name('export');
            Route::post('/import', 'ListingController@import')->name('import');
            Route::post('/statue', 'ListingController@statue')->name('statue');
            Route::post('/load', 'ListingController@load')->name('load');
            Route::post('/history', 'ListingController@history')->name('history');
            Route::get('/listing', 'ListingController@listing')->name('listing');
        });

        // statistiques 
        Route::group(['prefix' => '/statistiques', 'as' => 'statistiques.' ], function () {
            Route::get('/revenue', 'StatistiquesController@revenue')->name('revenue');
            Route::get('/cash', 'StatistiquesController@cash')->name('cash');
            Route::get('/products', 'StatistiquesController@products')->name('products');
            Route::get('/cities', 'StatistiquesController@cities')->name('cities');
            Route::get('/employees', 'StatistiquesController@employees')->name('employees');
            Route::get('/providers', 'StatistiquesController@providers')->name('providers');
        });

        // statistiques 
        Route::group(['prefix' => '/settings', 'as' => 'settings.' ], function () {
            Route::get('/revenue', 'StatistiquesController@revenue')->name('revenue');
            Route::get('/cash', 'StatistiquesController@cash')->name('cash');
            Route::get('/products', 'StatistiquesController@products')->name('products');
            Route::get('/cities', 'StatistiquesController@cities')->name('cities');
            Route::get('/employees', 'StatistiquesController@employees')->name('employees');
            Route::get('/providers', 'StatistiquesController@providers')->name('providers');
        });



});

Route::group(['prefix' => '/employee', 'as' => 'employee.' ], function () {
	Route::get('/', 'EmployeesController@index')->name('index');
	Route::get('/create', 'EmployeesController@create')->name('create');
	Route::post('/store', 'EmployeesController@store')->name('store');
	Route::get('/edit', 'EmployeesController@edit')->name('edit');
	Route::post('/update', 'EmployeesController@update')->name('update');
	Route::post('/export', 'EmployeesController@export')->name('export');
	Route::post('/import', 'EmployeesController@import')->name('import');
	Route::post('/statue', 'EmployeesController@statue')->name('statue');
	Route::post('/load', 'EmployeesController@load')->name('load');
	Route::post('/history', 'EmployeesController@history')->name('history');
	Route::get('/listing', 'EmployeesController@listing')->name('listing');
});

Route::group(['prefix' => '/provider', 'as' => 'provider.' ], function () {
	Route::get('/', 'ProvidersController@index')->name('index');
	Route::post('/export', 'ProvidersController@export')->name('export');
	Route::post('/statue', 'ProvidersController@statue')->name('statue');
	Route::post('/load', 'ProvidersController@load')->name('load');
	Route::post('/history', 'ProvidersController@history')->name('history');
	Route::get('/listing', 'ProvidersController@listing')->name('listing');
});


