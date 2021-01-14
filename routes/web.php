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


    Route::get('/profile', 'ProfileController@admin')->name('profile');
    Route::view('/settings', 'dashboard.settings.index')->name('settings');
    Route::post('/update', 'SettingsController@updateDashboard')->name('update');



    // users
    Route::group(['prefix' => '/users', 'as' => 'users.' ], function () {
        Route::get('/', 'UsersController@index')->name('index');
        Route::view('/create', 'dashboard.users.create')->name('create');
        Route::post('/store', 'UsersController@store')->name('store');
        Route::get('/edit/{role}/{id}', 'UsersController@edit')->name('edit');
        Route::post('/update/{role}/{id}', 'UsersController@update')->name('update');
        Route::get('/delete/{role}/{id}', 'UsersController@delete')->name('delete');
        Route::get('/updatePassword', 'UsersController@updatePassword')->name('updatePassword');
    });


    // products
    Route::group(['prefix' => '/products', 'as' => 'products.' ], function () {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::view('/create', 'dashboard.products.create')->name('create');
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
        Route::get('/trashed', 'ListingController@trashed')->name('trashed');
        Route::get('/new', 'ListingController@new')->name('new');
        Route::get('/employees', 'ListingController@employees')->name('employees');
        Route::get('/providers', 'ListingController@providers')->name('providers');

        Route::post('/create', 'ListingController@create')->name('create');
        Route::post('/store', 'ListingController@store')->name('store');
        Route::post('/edit/{id}', 'ListingController@edit')->name('edit');
        Route::post('/update/{id}', 'ListingController@update')->name('update');
        Route::post('/delete/{id}', 'ListingController@delete')->name('delete');
        Route::post('/destroy/{id}', 'ListingController@destroy')->name('destroy');
        Route::view('/assign', 'admin.users.create')->name('assign');
        Route::post('/restore/{id}', 'ListingController@restore')->name('restore');
        Route::view('/export', 'admin.users.create')->name('export');
        Route::view('/import', 'admin.users.create')->name('import');
        Route::post('/statue/{id}', 'ListingController@statue')->name('statue');
        Route::post('/load/{id}', 'ListingController@load')->name('load');
        Route::post('/history/{id}', 'ListingController@history')->name('history');
        Route::post('/listing', 'ListingController@listing')->name('listing');

        Route::post('/bulkstatus', 'ListingController@bulkstatus')->name('bulkstatus');
        Route::post('/filter', 'ListingController@filter')->name('filter');
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
    Route::post('/create', 'EmployeesController@create')->name('create');
    Route::post('/store', 'EmployeesController@store')->name('store');
    Route::post('/edit/{id}', 'EmployeesController@edit')->name('edit');
    Route::get('/profile', 'ProfileController@employee')->name('profile');
    Route::post('/update/{role}/{id}', 'UsersController@update')->name('update');
    Route::post('/export', 'EmployeesController@export')->name('export');
    Route::post('/import', 'EmployeesController@import')->name('import');
    Route::post('/statue/{id}', 'EmployeesController@statue')->name('statue');
    Route::post('/load/{id}', 'EmployeesController@load')->name('load');
    Route::post('/history', 'EmployeesController@history')->name('history');
    Route::any('/listing', 'EmployeesController@listing')->name('listing');
    

    Route::post('/bulkstatus', 'EmployeesController@bulkstatus')->name('bulkstatus');
    Route::post('/filter', 'EmployeesController@filter')->name('filter');
    Route::get('/edit/{role}/{id}', 'UsersController@editEmployee')->name('profile.edit');
});

  // provider
  Route::group(['prefix' => '/provider', 'as' => 'provider.' , 'middleware' => 'IsProvider' ], function () {
    Route::get('/', 'ProvidersController@index')->name('index');
    Route::view('/settings', 'staff.provider.settings')->name('settings');
    Route::get('/profile', 'ProfileController@provider')->name('profile');
	Route::post('/export', 'ProvidersController@export')->name('export');
	Route::post('/statue/{id}', 'ProvidersController@statue')->name('statue');
	Route::post('/load/{id}', 'ProvidersController@load')->name('load');
    Route::post('/listing', 'ProvidersController@listing')->name('listing');
    Route::post('/update/{role}/{id}', 'UsersController@update')->name('update');
    
    Route::post('/bulkstatus', 'ProvidersController@bulkstatus')->name('bulkstatus');
    Route::post('/filter', 'ProvidersController@filter')->name('filter');
    Route::get('/edit/{role}/{id}', 'UsersController@editProvider')->name('profile.edit');
});


Route::group(['prefix' => '/client', 'as' => 'client.'], function () {
    Route::middleware('IsClient')->group(function () {
        Route::get('/orderNow', 'YoussefController\ClientController@orderNow')->name('orderNow');
        Route::post('/orderStore', 'YoussefController\ClientController@storeNewOrderPanel')->name('orderStore');
        Route::get('/orderUnpaid/{id}', 'YoussefController\ClientController@orderUnpaid')->name('orderUnpaid');
        Route::post('/checkout/{id}', 'YoussefController\ClientController@checkout')->name('checkout');
        Route::get('/{id}/pay', 'YoussefController\ClientController@stripePayment')->name('payOrder');
        Route::post('/{id}/payOrder', 'YoussefController\ClientController@payOrder')->name('stripe.proceed');
        Route::get('/panels', 'YoussefController\ClientController@panels')->name('panels');
        Route::get('/{id}/staff', 'YoussefController\ClientController@staff')->name('staff');
        Route::get('/orders', 'YoussefController\ClientController@orders')->name('orders');
        Route::get('/{id}/orderDetail', 'YoussefController\ClientController@orderDetail')->name('orderDetail');
        Route::view('/settings', 'client.settings')->name('settings');
        // AJAX CLIENT
        Route::post('/staff/add/{id}', 'YoussefController\AjaxController@addUserStaff')->name('staff.add');
        Route::post('/staff/edit/{id}', 'YoussefController\AjaxController@editStaff')->name('staff.edit');
        Route::post('/staff/update/{id}', 'YoussefController\AjaxController@updatePassword')->name('staff.password.update');
        Route::post('/settings/update', 'YoussefController\AjaxController@updateUserSettings')->name('settings.update');
        

        Route::post('/update', 'ClientsController@update')->name('update');
        Route::post('/editSettings', 'ClientsController@editSettings')->name('editSettings');
        Route::get('/stores', 'ClientsController@stores')->name('stores');
        Route::view('/support', 'client.support')->name('support');
        Route::post('/createTicket', 'ClientsController@createTicket')->name('createTicket');
        Route::view('/ticketdetail', 'client.ticketdetail')->name('ticketdetail');
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