<?php

use Illuminate\Support\Facades\Route;

// /dashboard/stock

Route::get('/',                     'StockController@index'             )->name('index'                 );
Route::post('/create_entree',       'StockController@store_entree'      )->name('create.entree'         );
Route::post('/save/retour',         'StockController@saveRetour'        )->name('save.retour'           );
Route::get('/create_sortie',        'StockController@create_sortie'     )->name('create.sortie'         );
Route::post('/create_sortie',       'StockController@store_sortie'      )->name('create.sortie'         );
Route::post('/create',              'StockController@create'            )->name('create'                );
Route::post('/return',              'StockController@return'            )->name('return'                );
Route::post('/export',              'StockController@export'            )->name('export'                );
Route::post('/validateSortieList',  'StockController@validateSortieList')->name('validateSortieList'    );

Route::post('/get/rest',            'StockController@rest'              )->name('rest'                  );
Route::post('/loadSortieLists',     'StockController@loadSortieList'    )->name('loadSortieList'        );

Route::get('/list/retour',          'StockController@listRetour'        )->name('retour'                );