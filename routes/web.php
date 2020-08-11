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

Route::middleware(['auth', 'no_cache'])->group(function (){
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('tax-audits', 'TaxAuditController');
    Route::resource('tax-payers', 'TaxPayerController');

    Route::resource('users', 'UserController');
});

Auth::routes();
