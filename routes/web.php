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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-users')->group(function(){
    Route::resource('/users','UsersController',['except'=>['show','create','store']]);
    Route::get('/home', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/user-list', 'DashboardController@userList')->name('user-list');
});

Route::namespace('User')->prefix('user')->name('user.')->middleware('can:general-users')->group(function(){
    Route::get('/home','HomeController@index')->name('home');
});

Route::get('/books', 'BookController@index')->name('books');

Route::get('/payment/{id}', 'PaymentController@payment')->name('payment')->middleware('can:general-users');

Route::post('/stripepost', 'PaymentController@stripePost')->name('stripe.post')->middleware('can:general-users');

Route::get('/stripecard/{id}', 'PaymentController@stripeCard')->name('stripe.card')->middleware('can:general-users');

Route::get('/stripebank/{id}', 'PaymentController@stripeBank')->name('stripe.bank')->middleware('can:general-users');
