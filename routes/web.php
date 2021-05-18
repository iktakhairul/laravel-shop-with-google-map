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

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.shops.index')->with('status', session('status'));
    }

    return redirect()->route('admin.shops.index');
});

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('shop/{shop}', 'App\Http\Controllers\HomeController@show')->name('shop');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
//    Route::get('/', 'App\Http\Controllers\AdminsHomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'App\Http\Controllers\PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'App\Http\Controllers\PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'App\Http\Controllers\RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'App\Http\Controllers\RolesController');

    // Users
    Route::delete('users/destroy', 'App\Http\Controllers\UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'App\Http\Controllers\UsersController');

    // Categories
    Route::delete('categories/destroy', 'App\Http\Controllers\CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'App\Http\Controllers\CategoriesController');

    // Shops
    Route::delete('shops/destroy', 'App\Http\Controllers\ShopsController@massDestroy')->name('shops.massDestroy');
    Route::post('shops/media', 'App\Http\Controllers\ShopsController@storeMedia')->name('shops.storeMedia');
    Route::resource('shops', 'App\Http\Controllers\ShopsController');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
