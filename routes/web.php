<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
*/







//Auth::routes();

Route::post('/apilisting', 'ApiController@listing')->name('apilisting');

//admins Login
Route::get('/admin/login', 'Auth\LoginController@adminlogin')->name('login.admin');
Route::post('/admin/checklogin', 'Auth\LoginController@adminattempt')->name('attempt');
Route::post('/admin/logout', 'Auth\LoginController@adminlogout')->name('logout.admin');

//provider Login
Route::get('/provider/login', 'Auth\LoginController@providerlogin')->name('login.provider');
Route::post('/provider/checklogin', 'Auth\LoginController@providerattempt')->name('attempt.provider');
Route::post('/provider/logout', 'Auth\LoginController@providerlogout')->name('logout.provider');

//employees Login
Route::get('/employee/login', 'Auth\LoginController@employeelogin')->name('login.employee');
Route::post('/employee/checklogin', 'Auth\LoginController@employeeattempt')->name('attempt.employee');
Route::post('/employee/logout', 'Auth\LoginController@employeelogout')->name('logout.employee');



Route::view('/', 'index')->name('index');
Route::view('/index', 'index')->name('index');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/about', 'about-us')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/faq', 'faq')->name('faq');
Route::view('/singin', 'login')->name('singin');
Route::view('/re-password', 're-password')->name('re-password');
Route::view('/singup', 'singup')->name('singup');



Route::group(['prefix' => '/dashboard', 'as' => 'dashboard.' , 'middleware' => 'IsAdmin' ], function () {

    Route::get('/', function () {
        return view('dashboard/index');
    });

    Route::get('/test', function () {
        return view('test');
    });


    Route::view('/profile', 'dashboard.users.profile')->name('profile');
    Route::view('/settings', 'dashboard.settings.index')->name('settings');
    Route::post('/update', 'SettingsController@updateDashboard')->name('update');



    // users
    Route::group(['prefix' => '/users', 'as' => 'users.' ], function () {
        Route::get('/', 'UsersController@index')->name('index');
        Route::get('/create', 'UsersController@create')->name('create');
        Route::post('/store', 'UsersController@store')->name('store');
        Route::get('/edit/{id}', 'UsersController@edit')->name('edit');
        Route::post('/update/{id}', 'UsersController@update')->name('update');
        Route::get('/delete/{id}', 'UsersController@delete')->name('delete');
        Route::get('/updatePassword', 'UsersController@updatePassword')->name('updatePassword');
    });


    // products
    Route::group(['prefix' => '/products', 'as' => 'products.' ], function () {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::get('/create', 'ProductsController@create')->name('create');
        Route::post('/store', 'ProductsController@store')->name('store');
        Route::get('/edit/{id}', 'ProductsController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductsController@update')->name('update');
        Route::get('/delete/{id}', 'ProductsController@delete')->name('delete');
    });


    // cities
    Route::group(['prefix' => '/cities', 'as' => 'cities.' ], function () {
        Route::get('/', 'CitiesController@index')->name('index');
        Route::post('/create', 'CitiesController@create')->name('create');
        Route::post('/store', 'CitiesController@store')->name('store');
        Route::post('/edit/{id}', 'CitiesController@edit')->name('edit');
        Route::post('/update/{id}', 'CitiesController@update')->name('update');
        Route::get('/delete/{id}', 'CitiesController@delete')->name('delete');
    });


    // stock
    Route::group(['prefix' => '/stock', 'as' => 'stock.' ], function () {
        Route::get('/', 'StockController@index')->name('index');
        Route::view('/reception', 'dashboard.stock.reception')->name('reception');
        Route::get('/create', 'StockController@create')->name('create');
        Route::post('/store', 'StockController@store')->name('store');
        Route::get('/edit', 'StockController@edit')->name('edit');
        Route::post('/update', 'StockController@update')->name('update');
        Route::get('/delete', 'StockController@delete')->name('store');
    });


    // lists
    Route::group(['prefix' => '/listing', 'as' => 'listing.' ], function () {

        Route::get('/', 'ListingController@index')->name('index');
        Route::get('/new', 'ListingController@new')->name('new');
        Route::get('/employees', 'ListingController@employees')->name('employees');
        Route::get('/providers', 'ListingController@providers')->name('providers');

        Route::post('/create', 'ListingController@create')->name('create');
        Route::post('/store', 'ListingController@store')->name('store');
        Route::post('/edit/{id}', 'ListingController@edit')->name('edit');
        Route::post('/update/{id}', 'ListingController@update')->name('update');
        Route::post('/delete', 'ListingController@delete')->name('delete');
        Route::post('/destroy', 'ListingController@destroy')->name('destroy');
        Route::view('/assign', 'admin.users.create')->name('assign');
        Route::post('/restore', 'ListingController@restore')->name('restore');
        Route::view('/export', 'admin.users.create')->name('export');
        Route::view('/import', 'admin.users.create')->name('import');
        Route::post('/statue/{id}', 'ListingController@statue')->name('statue');
        Route::post('/load/{id}', 'ListingController@load')->name('load');
        Route::view('/history', 'admin.users.create')->name('history');
        Route::post('/listing', 'ListingController@listing')->name('listing');
    });

    // statistiques
    Route::group(['prefix' => '/statistiques', 'as' => 'statistiques.' ], function () {
        Route::get('/', 'StatistiquesController@index')->name('index');
        Route::view('/revenue', 'dashboard.statistiques.revenue')->name('revenue');
        Route::get('/cash', 'StatistiquesController@cash')->name('cash');
        Route::get('/products', 'StatistiquesController@products')->name('products');
        Route::get('/cities', 'StatistiquesController@cities')->name('cities');
        Route::get('/employees', 'StatistiquesController@employees')->name('employees');
        Route::get('/providers', 'StatistiquesController@providers')->name('providers');
    });

});


// employee
Route::group(['prefix' => '/employee', 'as' => 'employee.' , 'middleware' => 'IsEmployee' ], function () {
    Route::get('/', 'EmployeesController@index')->name('index');
    Route::get('/create', 'EmployeesController@create')->name('create');
    Route::post('/store', 'EmployeesController@store')->name('store');
    Route::get('/edit', 'EmployeesController@edit')->name('edit');
    Route::view('/settings', 'staff.employee.settings')->name('settings');
    Route::post('/update', 'EmployeesController@update')->name('update');
    Route::post('/export', 'EmployeesController@export')->name('export');
    Route::post('/import', 'EmployeesController@import')->name('import');
    Route::post('/statue', 'EmployeesController@statue')->name('statue');
    Route::post('/load', 'EmployeesController@load')->name('load');
    Route::post('/history', 'EmployeesController@history')->name('history');
    Route::get('/listing', 'EmployeesController@listing')->name('listing');
});

  // provider
  Route::group(['prefix' => '/provider', 'as' => 'provider.' , 'middleware' => 'IsProvider' ], function () {
    Route::get('/', 'ProvidersController@index')->name('index');
    Route::view('/settings', 'staff.provider.settings')->name('settings');
	Route::post('/export', 'ProvidersController@export')->name('export');
	Route::post('/statue', 'ProvidersController@statue')->name('statue');
	Route::post('/load', 'ProvidersController@load')->name('load');
	Route::post('/history', 'ProvidersController@history')->name('history');
	Route::get('/listing', 'ProvidersController@listing')->name('listing');
});


Route::group(['prefix' => '/client', 'as' => 'client.'], function () {
    Route::middleware('IsClient')->group(function () {
        Route::view('/ordernow', 'client.ordernow')->name('ordernow');
        Route::post('/orderStore', 'ClientsController@orderStore')->name('orderStore');
        Route::view('/orders', 'client.orders')->name('orders');
        Route::view('/orderdetail', 'client.orderPaid')->name('orderdetail');
        Route::view('/orderUnpaid', 'client.orderUnpaid')->name('orderUnpaid');
        Route::view('/settings', 'client.settings')->name('settings');
        Route::post('/update', 'ClientsController@update')->name('update');
        Route::post('/editSettings', 'ClientsController@editSettings')->name('editSettings');
        Route::view('/staff', 'client.staff')->name('staff');
        Route::get('/stores', 'ClientsController@stores')->name('stores');
        Route::view('/support', 'client.support')->name('support');
        Route::post('/createTicket', 'ClientsController@createTicket')->name('createTicket');
        Route::view('/ticketdetail', 'client.ticketdetail')->name('ticketdetail');
        Route::view('/panels', 'client.panels')->name('panels');
        Route::get('/dashboard', 'ClientsController@dashboard')->name('dashboard');
        Route::post('/export', 'ProvidersController@export')->name('export');
    Route::post('/statue', 'ProvidersController@statue')->name('statue');
    Route::post('/load', 'ProvidersController@load')->name('load');
    Route::post('/history', 'ProvidersController@history')->name('history');
    Route::get('/listing', 'ProvidersController@listing')->name('listing');
    });
    // Authentication routes
    Route::get('/register', 'Auth\RegisterController@showClientRegisterView')->name('register');
    Route::post('/store', 'Auth\RegisterController@createClient')->name('store');
    Route::get('/login', 'Auth\LoginController@showClientLoginForm')->name('login');
    Route::post('/attempt', 'Auth\LoginController@loginClient')->name('attempt');
    Route::get('/logout', 'Auth\LoginController@logoutClient')->name('logout');


});
Auth::routes(['verify' => true]);

Route::post('file-import', 'ExcelController@fileImport')->name('file-import');
Route::get('file-export', 'ExcelController@fileExport')->name('file-export');
