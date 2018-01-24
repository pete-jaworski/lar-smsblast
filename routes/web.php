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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('checkPassword')->name('home');
//Route::get('/home', 'TaskController@index')->middleware('checkPassword')->name('home');

Route::get('/change-password', 'ChangeNameController@displayForm')->name('change-password');

Route::post('/change-password-submit', 'ChangeNameController@change')->name('change-password-submit');

Route::resource('users','UserController')->only(array('index','update','edit','destroy'));

Route::resource('gate','SMSGateController')->only(array('index','store'));

Route::resource('tasks','TaskController');

Route::get('/current-tasks', 'TaskController@current')->name('tasks.current');