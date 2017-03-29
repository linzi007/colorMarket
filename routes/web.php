<?php

use Illuminate\Support\Facades\Redis;

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

Route::get('/', 'WelcomeController@index');

Route::get('/chat', 'ChatController@getChatView');

Route::post('/chat', 'ChatController@chat');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('storeLevels', 'StoreLevelController');

Route::resource('storeClasses', 'StoreClassController');

Route::resource('storeClasses', 'StoreClassController');

Route::resource('storeClasses', 'StoreClassController');

Route::resource('storeClasses', 'StoreClassController');

Route::resource('storeClasses', 'StoreClassController');