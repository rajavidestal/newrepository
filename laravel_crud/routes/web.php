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

Route::get('/articles', 'App\Http\Controllers\ArticleController@show')->name('articles');

Route::get('/articles/add', 'App\Http\Controllers\ArticleController@addArticle')->name('article.add');

Route::post('/articles/add', 'App\Http\Controllers\ArticleController@saveArticle')->name('article.save');

Route::get('/articles/edit/{id}', 'App\Http\Controllers\ArticleController@editArticle')->name('article.edit');

Route::post('/articles/edit/{id}', 'App\Http\Controllers\ArticleController@updateArticle')->name('article.update');

Route::get('/articles/delete/{id}', 'App\Http\Controllers\ArticleController@deleteArticle')->name('article.delete');


Route::get('/', function () {
    return view('welcome');
});