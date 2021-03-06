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

Route::get('pay', 'PayOrderController@store');

Route::get('channel', 'ChannelController@index');

Route::get('cart', 'CartController@index');

Route::get('video', 'PolymorphicController@video');

Route::get('post', 'PolymorphicController@post');

Route::get('user', 'PolymorphicController@user');


Route::get('notif', function () {
    $user = \App\User::first();
    $mail = $user->notify(new \App\Notifications\InvoicePaid());
    dd($mail);
    return $mail;
});
