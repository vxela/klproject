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

Route::get('/', 'PortalController@index')->name('/');

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login/auth', 'LoginController@auth');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/register', 'LoginController@register')->name('register');

Route::post('/guest/register', 'RegisterController@register')->name('user_register');

Route::post('/user/update_picture_ikan/', 'UserController@updateFishPicture')->name('user.update_fish_picture');
Route::post('/user/update_ikan/', 'UserController@updateFish')->name('user.update_fish');
Route::get('/user/data_ikan/{id}', 'UserController@showDetailFish')->name('user.detail_fish');
Route::post('/store/register_ikan/', 'UserController@userStoreFish')->name('user.store_ikan');
Route::get('/user/register_ikan/{id}', 'UserController@userRegisterFish')->name('user.regis_ikan');
Route::get('/user/personal_data/{id}', 'UserController@personalData')->name('user.personal');
Route::get('/user/fish_data/{id}', 'UserController@fishData')->name('user.fish');
Route::get('/user/dashboard', 'UserController@index')->name('user.dashboard');
Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');