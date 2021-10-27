<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>['auth:admin'],'prefix'=>'admin'], function () {

    Route::get('/','WelcomeController@index')->name('welcome');

    //logout route
    Route::post('logout', 'AuthController@logout')->name('logout');

    Route::resource('category', 'CategoryController')->except('show');

    Route::resource('tag', 'TagController')->except('show');

    Route::resource('author', 'AuthorController')->except('show');

    Route::resource('article', 'ArticleController')->except('show');

    Route::resource('comment', 'CommentController')->except('edit','store','update','create');

    Route::resource('custom', 'CustomController');

    Route::get('setting', 'SettingController@index')->name('setting.show');

    Route::post('setting', 'SettingController@edit')->name('setting.edit');

    Route::get('contact', 'SettingController@contact')->name('setting.contact');

    Route::get('news', 'SettingController@news')->name('setting.news');

    Route::post('news/delete/{id}', 'SettingController@deleteNews')->name('setting.news.delete');

    Route::post('contact/delete/{id}', 'SettingController@deleteContact')->name('setting.contact.delete');

});  /** End of Route Group  */



/** Start Auth Section */

Route::group(['middleware'=>'guest:admin','prefix'=>'admin'], function () {

    Route::get('login', 'AuthController@getLogin')->name('getLogin');
    Route::post('login', 'AuthController@login')->name('login');

});
