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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("/admin")->middleware(['auth', 'isblock', 'role:admin'])->group(function () {

    Route::get('/', 'Admin\TravelAgencyController@index')->name('admin');

    Route::get('/agency', 'Admin\TravelAgencyController@list')->name('agency');    
    
    Route::get('/agency/create', 'Admin\TravelAgencyController@showForm');
    Route::post('/agency/create', 'Admin\TravelAgencyController@create')->name('agency-create');

    Route::get('agency/edit/{id}', 'Admin\TravelAgencyController@editForm')->name('agency-edit');
    Route::post('agency/edit/{id}', 'Admin\TravelAgencyController@update')->name('agency-update');

    Route::get('agency/delete/{id}', 'Admin\TravelAgencyController@delete')->name('agency-delete');

    Route::get('user', 'Admin\UserController@list')->name('user');   
    
    Route::get('user/create', 'Admin\UserController@showForm');
    Route::post('user/create', 'Admin\UserController@create')->name('user-create');

    Route::get('user/edit/{id}', 'Admin\UserController@editForm')->name('user-edit');
    Route::post('user/updete/{id}', 'Admin\UserController@update')->name('user-update');

    Route::get('user/delete/{id}', 'Admin\UserController@delete')->name('user-delete');
});

Route::prefix("/agent")->middleware(['auth', 'isblock', 'role:agent'])->group(function () {

    Route::get('/', 'Agent\TourController@index')->name('agent');    

    Route::get('tour', 'Agent\TourController@list')->name('tour');    
    
    Route::get('tour/create', 'Agent\TourController@showForm');
    Route::post('tour/create', 'Agent\TourController@create')->name('tour-create');

    Route::get('tour/edit/{id}', 'Agent\TourController@editForm')->name('tour-edit');
    Route::post('tour/edit/{id}', 'Agent\TourController@update')->name('tour-update');

    Route::get('user', 'Agent\UserController@list')->name('view-users');   

    Route::get('assign/create', 'Agent\UsersTourController@showForm');
    Route::post('assign/create', 'Agent\UsersTourController@create')->name('assign-create');

    Route::get('assign/edit/{id}', 'Agent\UsersTourController@editForm')->name('assign-edit');
    Route::post('assign/update/{id}', 'Agent\UsersTourController@update')->name('assign-update');
});

Route::get('/tour', 'Client\TourController@list')->middleware('auth', 'isblock', 'role:client')->name('view-tours');
