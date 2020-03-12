<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $topArticles = App\Article::take(2)->latest()->get();
    $articles = App\Article::latest()->paginate(5);
    return view('welcome', compact('articles', 'topArticles'));
})->name('welcome');

// Route::get('/articles', 'ArticlesController@index')->name('articles.index');

Route::get('/articles', 'ArticlesController@index')->name('article.index');
Route::post('/articles', 'ArticlesController@store')->name('article.store');
Route::get('/articles/create', 'ArticlesController@create')->name('article.create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('article.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit')->name('article.edit');
Route::put('/articles/{article}', 'ArticlesController@update')->name('article.update');
Route::delete('/articles/{article}', 'ArticlesController@destroy')->name('article.destroy');

Route::get('/feedback', 'FeedbackController@index')->name('page.feedback');
Route::post('/feedback', 'FeedbackController@store')->name('page.store');
Route::get('/feedback/{feedback}', 'FeedbackController@show')->name('feedback.show');
Route::get('/feedback/{feedback}/edit', 'FeedbackController@edit')->name('feedback.edit');
Route::put('/feedback/{feedback}', 'FeedbackController@update')->name('feedback.update');
Route::delete('/feedback/{feedback}', 'FeedbackController@destroy')->name('feedback.destroy');




Route::get('/contacts', 'PagesController@contacts')->name('page.contacts');
Route::get('/about', 'PagesController@about')->name('page.about');
Route::get('/admin', 'PagesController@admin')->name('page.admin');
