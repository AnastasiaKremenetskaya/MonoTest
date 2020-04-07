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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('/users', 'UsersController', [
//    'names' => [
//        'create' => 'users.create',
//        'update' => 'users.update',
//        'edit' => 'users.edit',
//        'store' => 'users.store',
//    ],
//    'parameters' => [
//        'users' => 'id'
//    ]
//]);

//Route::resource('/cars', 'CarsController', [
//    'names' => [
//        'create' => 'cars.create',
//        'update' => 'cars.update',
//        'edit' => 'cars.edit',
//        'store' => 'cars.store',
//    ],
//    'parameters' => [
//        'cars' => 'id'
//    ]
//]);


Route::group(['prefix' => 'cars'], function () {
    Route::post('store', 'CarsController@store');
    Route::post('update/{id}', 'CarsController@update');
});
