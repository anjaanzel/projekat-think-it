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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')
;
Route::get('/admin/index', 'Admin\DashboardController@index')->name('admin.index')
;

Route::get('/admin/users/index', 'Admin\UsersController@index')->name('admin.users.index')
;
Route::get('/admin/users/{user}/edit', 'Admin\UsersController@edit')->name('admin.users.edit')
;
Route::put('/admin/users/{user}/update', 'Admin\UsersController@update')->name('admin.users.update')
;
Route::get('/admin/users/destroy', 'Admin\UsersController@destroy')->name('admin.users.destroy')
;
Route::get('/admin/users/create', 'Admin\UsersController@create')->name('admin.users.create')
;

Route::get('/admin/ships/index', 'Admin\ShipsController@index')->name('admin.ships.index')
;
Route::get('/admin/ships/{ship}/edit', 'Admin\ShipsController@edit')->name('admin.ships.edit')
;
Route::put('/admin/ships/{ship}/update', 'Admin\ShipsController@update')->name('admin.ships.update')
;
Route::get('/admin/ships/destroy', 'Admin\ShipsController@destroy')->name('admin.ships.destroy')
;
Route::get('/admin/ships/create', 'Admin\ShipsController@create')->name('admin.ships.create')
;

Route::get('/admin/roles/index', 'Admin\RolesController@index')->name('admin.roles.index')
;
Route::get('/admin/roles/{role}/edit', 'Admin\RolesController@edit')->name('admin.roles.edit')
;
Route::put('/admin/roles/{role}/update', 'Admin\RolesController@update')->name('admin.roles.update')
;
Route::get('/admin/roles/destroy', 'Admin\RolesController@destroy')->name('admin.roles.destroy')
;
Route::get('/admin/roles/create', 'Admin\RolesController@create')->name('admin.roles.create')
;


Route::get('/admin/notifications/create', 'Admin\NotificationsController@create')->name('admin.notifications.create')
;

Route::post('/home/{id}', 'HomeController@markAsRead', function($id){})->name('markAsRead')
;
//Route::get('/password', 'Admin\UsersController@inputPassword')->name('password');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

	Route::resource('/users', 'UsersController');
	Route::resource('/ships', 'ShipsController');
	Route::resource('/roles', 'RolesController');
	Route::resource('/notifications', 'NotificationsController');

});