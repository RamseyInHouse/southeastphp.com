<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('user', ['uses' => 'Api\UserController@create']);
Route::post('login', ['uses' => 'Api\AuthController@create']);

Route::get('emails', ['uses' => 'Api\EmailController@index']);
Route::post('email', ['uses' => 'Api\EmailController@store']);
Route::post('airports', ['uses' => 'Api\AirportController@index']);