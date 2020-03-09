<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $topArticles = App\Article::take(2)->latest()->get();
    $articles = App\Article::latest()->get();
    return view('welcome', compact('articles', 'topArticles'));
})->name('welcome');

// Route::get('/articles', 'ArticlesController@index')->name('articles.index');

Route::post('/articles', 'ArticlesController@store')->name('article.store');
Route::get('/articles/create', 'ArticlesController@create')->name('article.create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('article.show');

Route::get('/feedback', 'FeedbackController@index')->name('page.feedback');
Route::post('/feedback', 'FeedbackController@store')->name('page.store');
Route::get('/feedback/{feedback}', 'FeedbackController@show')->name('feedback.show');

Route::get('/contacts', 'PagesController@contacts')->name('page.contacts');
Route::get('/about', 'PagesController@about')->name('page.about');
Route::get('/admin', 'PagesController@admin')->name('page.admin');
