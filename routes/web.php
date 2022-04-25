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
    Route::resource('/users', 'UserController');
    Route::resource('/messages', 'MessageController');
    Route::resource('/reviews', 'ReviewController');
    Route::resource('/sponsorships', 'SponsorshipController');
    //PAGAMENTO
    Route::get('/users/{user:id}/sponsorship', 'PaymentsController@process')->name('payment');
    Route::post('/users/{user:id}/sponsorship/checkout', 'PaymentsController@checkout')->name('paymentcheckout');
});

Route::get('{any?}', function () {
    return view('front');
})->where("any", ".*");
