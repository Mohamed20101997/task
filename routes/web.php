<?php

use Illuminate\Support\Facades\Route;


    Route::get('/','HomeController@home')->name('home');

Route::group(['prefix'=>'article/'], function () {
    Route::get('blog/{id}','HomeController@articleBlog')->name('article.blog');
    Route::post('comment','HomeController@articleComment')->name('article.comment');
    Route::get('list/{id}','HomeController@articleList')->name('article.list');
    Route::get('list/tag/{id}','HomeController@articleListTag')->name('article.list.tag');
    Route::get('most-view','HomeController@mostView')->name('article.mostView');
    Route::get('recent','HomeController@recent')->name('article.recent');
    Route::get('featured','HomeController@featured')->name('article.featured');
    Route::get('trend','HomeController@trends')->name('article.trend');
});  /** End of Route Group  */

Route::group(['prefix'=>'setting/'], function () {
    Route::get('term','SettingController@term')->name('setting.term');
    Route::get('privacy','SettingController@term')->name('setting.privacy');
    Route::get('about','SettingController@about')->name('setting.about');
    Route::get('contact','SettingController@contact')->name('setting.contact');
});  /** End of Route Group  */

