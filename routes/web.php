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

Route::get('/', 'HomeController@create')->name('home');
Route::get('list', 'HomeController@index')->name('list');
Route::get('article', 'HomeController@article')->name('article');
Route::post('save', 'HomeController@store')->name('save');
Route::post('getOrderedBallArray', 'HomeController@getOrderedBallArray')->name('getOrderedBallArray');
