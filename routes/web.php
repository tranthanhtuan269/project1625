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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-friend', 'HomeController@addFriend')->name('addFriend');
Route::post('/send-request', 'HomeController@sendRequest')->name('sendRequest');

Route::get('/accept-friend', 'HomeController@acceptFriend')->name('acceptFriend');
Route::post('/accept-request', 'HomeController@acceptRequest')->name('acceptRequest');

Route::resource('groups', 'GroupController');
Route::resource('conversations', 'ConversationController');
