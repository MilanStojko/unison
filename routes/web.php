<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('front');
});

Auth::routes();

Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/user', 'UserController');
    Route::put('/update/{user}', 'UserController@update')->name('user.update');
});

Route::get('{any?}', function () {
    return view('front');
})->where("any", ".*");
