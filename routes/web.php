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
    return view('login');
});

Route::get('home', 'HomeController@view');

Route::get('room', function () {
    return view('room');
});

Route::get('item', function () {
    return view('item');
});

Route::get('report', function () {
    return view('report');
});

Route::get('employee', function () {
    return view('employee');
});

Route::post('createEmployee', 'EmployeeController@create');
Route::post('createItem', 'ItemController@create');
Route::post('createRoom', 'RoomController@create');


