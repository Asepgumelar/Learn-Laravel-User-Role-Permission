<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UserController;
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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('user', [UserController::class, 'index'])->name('user-index');
    Route::get('user/datatable', [UserController::class, 'getDataTable'])->name('user-getDataTable');
    Route::get('user/create', [UserController::class, 'showCreate'])->name('user-create');
    Route::post('user/store', [UserController::class, 'store'])->name('user-store');
    Route::post('user/delete', [UserController::class, 'delete'])->name('user-delete');
    Route::post('user/active', [UserController::class, 'active'])->name('user-active');

    Route::get('permission', [PermissionController::class, 'index'])->name('permission-index');
    Route::get('permission/datatable', [PermissionController::class, 'getDataTable'])->name('permission-getDataTable');
    Route::get('permission/create', [PermissionController::class, 'showCreate'])->name('permission-create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission-store');
    Route::post('permission/delete', [PermissionController::class, 'delete'])->name('permission-delete');

    Route::get('role', [RolesController::class, 'index'])->name('role-index');
    Route::get('role/datatable', [RolesController::class, 'getDataTable'])->name('role-getDataTable');
    Route::get('role/create', [RolesController::class, 'showCreate'])->name('role-create');
    Route::post('role/store', [RolesController::class, 'store'])->name('role-store');
    Route::post('role/delete', [RolesController::class, 'delete'])->name('role-delete');

});
