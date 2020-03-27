<?php

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
//Route::get('/', function () {
//    $menu = config("admin_menu");
//
//    return view('welcome')->withMenu($menu);
//})->name('welcome');

Route::get('/', 'AdminController@showMainPage')->name('main');

Route::resource('/users', 'UsersController', [
    'names' => [
        'index' => 'users.index',
        'show' => 'users.show',
        'create' => 'users.create',
        'update' => 'users.update',
        'edit' => 'users.edit',
        'store' => 'users.store',
        'destroy' => 'users.destroy'
    ],
    'parameters' => [
        'users' => 'id'
    ]
]);

Route::resource('/cars', 'CarsController', [
    'names' => [
        'index' => 'cars.index',
        'show' => 'cars.show',
        'create' => 'cars.create',
        'update' => 'cars.update',
        'edit' => 'cars.edit',
        'store' => 'cars.store',
        'destroy' => 'cars.destroy'
    ],
    'parameters' => [
        'cars' => 'id'
    ]
]);
