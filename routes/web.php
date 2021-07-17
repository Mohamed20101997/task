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



    Route::group(['middleware'=>'auth'], function () {

        Route::get('/logout',function(){
            auth()->logout();
            return redirect()->back();
        })->name('logout');

        Route::post('comment','FrontController@comment')->name('comment');
    });  /** End of Route Group  */


    Route::get('/','FrontController@home')->name('home');
    Route::get('read/{id}','FrontController@read')->name('read');
    Route::get('cat/{id}','FrontController@cat')->name('cat');
    Auth::routes();


