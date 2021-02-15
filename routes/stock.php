<?php

use Illuminate\Support\Facades\Route;

// Stock General System
Route::group(['prefix' => '/dashboard/stock', 'as' => 'stock.' ], function (){
    Route::get('/', 'StockController@index')->name('index');
    Route::post('/get/rest', 'StockController@rest')->name('rest');
    Route::get('/create_entree', 'StockController@create_entree')->name('stockGeneral.create.entree');
    //Route::post('/create_entree', 'StockController@store_entree')->name('stockGeneral.create.entree');
    Route::get('/create_sortie', 'StockController@create_sortie')->name('stockGeneral.create.sortie');
    // Route::post('/create_sortie', 'StockController@store_sortie')->name('stockGeneral.create.sortie');
    Route::get('/waiting', 'StockController@waitingGet')->name('stockGeneral.waitingGet');
    Route::post('/waiting', 'StockController@waitingAction')->name('stockGeneral.waitingAction');
    Route::post('/validateEntree', 'StockController@validateEntree')->name('stockGeneral.validateEntree');
    Route::post('/loadSortieLists', 'StockController@loadSortieList')->name('stockGeneral.loadSortieList');
    Route::post('/validateSortieList', 'StockController@validateSortieList')->name('stockGeneral.validateSortieList');
    Route::any('/loadEntreeHistory', 'StockController@loadEntreeHistory')->name('stockGeneral.loadEntreeHistory');
    Route::any('/loadHistorySortie', 'StockController@loadHistorySortie')->name('stockGeneral.loadSortieHistory');
    //Route::any('/save/retour', 'StockController@saveRetour')->name('stockGeneral.save.retour');
    Route::any('/list/retour', 'StockController@listRetour')->name('stockGeneral.retour');        
});

// stock
// Route::group(['prefix' => '/dashboard/stock', 'as' => 'stock.' ], function () {
//     Route::get('/', 'StockController@index')->name('index');
//     Route::view('/reception', 'dashboard.stock.reception')->name('reception');
//     Route::get('/create', 'StockController@create')->name('create');
//     Route::post('/store', 'StockController@store')->name('store');
//     Route::get('/edit', 'StockController@edit')->name('edit');
//     Route::post('/update', 'StockController@update')->name('update');
//     Route::get('/delete', 'StockController@delete')->name('store');
// });