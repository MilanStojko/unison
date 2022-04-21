<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->name('api.')->group(function () {
    // TUTTI GLI USER
    Route::get("/users", "UserController@index")->name('users');
    Route::get("/users/show/{slug}", "UserController@show")->name('users.show');
    Route::get("/users/count", "UserController@getCountReview");
    // MEDIA RECENSIONI
    Route::get("/users/avg/{minvote}", "UserController@getAvgVote");
    // TUTTE LE AVAILABILITY
    Route::get("/availability/index", "AvailabilityController@index");
    // FILTRO AVAILABILITY
    Route::get("/filtered/getavailability/{availability_id}", "FilterController@getAvailability")->name('fileter.getAvailability');
    // FILTRO NOME
    Route::get("/filtered/getname/{nome}", "FilterController@getFullName")->name('fileter.getFullName');
    // RECENSIONI
    Route::get("/review/show/{userid}", "ReviewController@index")->name('review.index');
    Route::post("/review/postReview", "ReviewController@store");
});
