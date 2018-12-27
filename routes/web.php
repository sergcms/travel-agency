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

Route::get('/', function () { return view('welcome'); })->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("/admin")->middleware(['auth', 'isblock', 'role:admin'])->group(function () {

    Route::get('/', 'Admin\TravelAgencyController@index')->name('admin');

    Route::get('/agency', 'Admin\TravelAgencyController@list')->name('agencies');    
    
    Route::get('/agency/create', 'Admin\TravelAgencyController@showForm');
    Route::post('/agency/create', 'Admin\TravelAgencyController@create')->name('agency-create');

    Route::get('/agency/edit/{id}', 'Admin\TravelAgencyController@showForm')->name('agency-edit');
    Route::post('/agency/edit/{id}', 'Admin\TravelAgencyController@update')->name('agency-update');

    Route::get('/user', 'UserController@list')->name('users');   
    
    Route::get('/user/create', 'UserController@showForm');
    Route::post('/user/create', 'UserController@create')->name('user-create');

    Route::get('/user/edit/{id}', 'UserController@showForm')->name('user-edit');
    Route::post('/user/update/{id}', 'UserController@update')->name('user-update');
});

Route::prefix("/agent")->middleware(['auth', 'isblock', 'role:agent'])->group(function () {

    Route::get('/', 'TourController@index')->name('agent');    

    Route::get('/tour', 'TourController@list')->name('tours');    
    
    Route::get('/tour/create', 'TourController@showForm');
    Route::post('/tour/create', 'TourController@create')->name('tour-create');

    Route::get('/tour/edit/{id}', 'TourController@showForm')->name('tour-edit');
    Route::post('/tour/edit/{id}', 'TourController@update')->name('tour-update');

    Route::get('/user', 'UserController@listAgentUsers')->name('view-users');   

    Route::get('/assign/create', 'Agent\UsersTourController@showForm');
    Route::post('/assign/create', 'Agent\UsersTourController@create')->name('assign-create');

    Route::get('/assign/edit/{id}', 'Agent\UsersTourController@showForm')->name('assign-edit');
    Route::post('/assign/update/{id}', 'Agent\UsersTourController@update')->name('assign-update');
});

Route::get('/tour', 'TourController@listToursClient')->middleware('auth', 'isblock', 'role:client')->name('view-tours');
