<?php

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
    return view('portal.page.index');
});

Route::get('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/login/auth', 'LoginController@auth');
Route::get('/register', 'LoginController@register')->name('register');

Route::post('/guest/register', 'RegisterController@register')->name('user_register');
Route::get('/user/dashboard', 'UserController@index')->name('user.dashboard');
Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');