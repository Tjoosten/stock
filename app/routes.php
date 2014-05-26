<?php
Route::group(['before' => 'force.ssl'], function(){
//HomeRoute
    Route::get('/', 'HomeController@index');
    Route::get('dashboard', 'DashboardController@index');

// Login / Logout handler
    Route::get('login', array('as' => 'login', 'uses' => 'SessionsController@create'));
    Route::get('logout', 'SessionsController@destroy');
    Route::resource('sessions', 'SessionsController', array('only' => array('create', 'store', 'destroy')));

// ApiController
    Route::post('api/products', 'ApiController@postProducts');

// Suppliers
    Route::resource('leveranciers', 'SuppliersController', array('except' => array('show')));
    Route::resource('leveranciers.products', 'ProductsController'); // Nested Resource Controller
    Route::resource('leveranciers.categories', 'CategoriesController', array('except' => array('create', 'show'))); // Nested Resource Controller

    Route::resource('klanten', 'CustomersController');
    Route::resource('klanten.products', 'StocksController');

    Route::resource('register', 'RegistrationsController', ['except' => ['index', 'show']]);

// Country
    Route::resource('land', 'CountriesController', ['except' => ['show']]);
// Partnerships / vennootschappen
    Route::resource('vennootschap', 'PartnershipsController', ['except' => ['show', 'create']]);

// Search
    Route::get('search', 'SearchController@index');
    Route::post('search', 'SearchController@postSearch');
    Route::get('search/customer', 'SearchController@getSearchCompany');
    Route::post('search/customer', 'SearchController@postSearchCompany');

// Export
    Route::get('export', 'ExportsController@index');
    Route::get('export/products', 'ExportsController@productExport');
    Route::get('export/history', 'ExportsController@historyExport');
});