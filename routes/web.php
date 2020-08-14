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
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', function () {
    return redirect()->route('dashboard');
});

Route::group(['namespace' => 'backend'], function () {
    Route::get('dashboard', 'DashboardController@index')
        ->name('dashboard');

    Route::get('user', 'UserController@index')
        ->name('user-index');

    Route::get('permission', 'PermissionController@index')
        ->name('permission-index');

    Route::get('role', 'RolesController@index')
        ->name('role-index');
});