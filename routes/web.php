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

Route::get('/', 'PagesController@home');
Route::get('/contact', 'PagesController@contact');
Route::get('/user', 'UsersController@list');
Route::get('/addUser', 'UsersController@add');
Route::get('/group', 'UsersController@group');
Route::get('/sub', 'UsersController@sub');
Route::get('/raw', 'UsersController@raw');
