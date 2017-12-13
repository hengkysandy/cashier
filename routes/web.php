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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('login');
    });

    // Route::post('doLogin', 'Auth\LoginController@login');
    Route::post('doLogin', 'EmployeeController@login');
});

Route::group(['middleware' => 'checkUser'], function () {
    //Home
    Route::get('home', 'HomeController@view');
    Route::post('createBooking', 'HomeController@createBooking');

    // Room
    Route::get('room', 'RoomController@view');
    Route::post('createRoom', 'RoomController@create');
    Route::post('updateRoom', 'RoomController@update');
    Route::get('deleteRoom/{id}', 'RoomController@delete');

    // Item
    Route::get('item', 'ItemController@view');
    Route::post('createItem', 'ItemController@create');
    Route::post('updateItem', 'ItemController@update');
    Route::get('deleteItem/{id}', 'ItemController@delete');

    // Employee
    Route::get('employee', 'EmployeeController@view');
    Route::post('createEmployee', 'EmployeeController@create');
    Route::post('updateEmployee', 'EmployeeController@update');
    Route::get('deleteEmployee/{id}', 'EmployeeController@delete');

    Route::get('report', function () {
        return view('report');
    });

    Route::get('logoutUser', 'EmployeeController@logoutUser');
});