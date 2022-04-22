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
    // SINGOLO USER CON FILTRO SULLO SLUG
    Route::get("/users/show/{slug}", "UserController@show")->name('users.show');
    // SOMMA RECENSIONI IN ORDINE DECRESCENTE
    Route::get("/users/count", "UserController@getCountReview");
    // MEDIA RECENSIONI -- DA FIXARE CON REQUEST
    Route::get("/users/avg/{minvote}", "UserController@getAvgVote");
    // TUTTE LE AVAILABILITY
    Route::get("/availability/index", "AvailabilityController@index");
    //TUTTE LE CATEGORY
    Route::get("/category/index", "CategoryController@index");
    // RESTITUISCE GLI USER CON FILTRO SU AVAILABILITY
    Route::get("/filtered/getavailability", "UserController@getAvailability")->name('filter.getAvailability');
    // FILTRO NOME -- DA FIXARE CON REQUEST
    Route::get("/filtered/getname", "FilterController@getFullName")->name('filter.getFullName');
    // RECENSIONI DEL SINGOLO USER
    Route::get("/review/show/{userid}", "ReviewController@index")->name('review.index');
    // MANDA LA RECENSIONE ALL'USER
    Route::post("/review/postReview", "ReviewController@store");
});
