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
    Route::get("/users", "UserController@index")->name('users');
    Route::get("/users/show/{slug}", "UserController@show")->name('users.show');
    Route::get("/users/reviews", "UserController@getReviewNumber");
    Route::get("/filtered/getavailability/{availability_id}", "FilterController@getAvailability")->name('fileter.getAvailability');
    Route::get("/filtered/getname/{nome}", "FilterController@getFullName")->name('fileter.getFullName');
    Route::get("/review/show/{userid}", "ReviewController@index")->name('review.index');
    Route::get("/review/count", "ReviewController@getCountReview");
});
