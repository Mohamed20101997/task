<?php

use Illuminate\Support\Facades\Route;


    Route::get('/','HomeController@home')->name('home');
    Route::get('article/blog/{id}','HomeController@articleBlog')->name('article.blog');
    Route::post('article/comment','HomeController@articleComment')->name('article.comment');



