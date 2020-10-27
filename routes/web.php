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

Route::get('/', 'MainController@welcome')->name('main.welcome');
Route::get('/contact', 'MainController@contact')->name('main.contact');

Route::get('/posts', 'PostController@index')->name('post.index');
Route::get('/post/search', 'PostController@search')->name('post.search');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/{id}', 'PostController@show')->where('id', '[0-9]+')->name('post.show');
Route::get('/post/edit/{id}', 'PostController@edit')->where('id', '[0-9]+')->name('post.edit');
Route::put('/post/{id}', 'PostController@update')->where('id', '[0-9]+')->name('post.update');
Route::delete('/post/delete/{id}', 'PostController@destroy')->where('id', '[0-9]+')->name('post.delete');

Route::get('/categories', 'CategoryController@index')->name('category.index');
Route::get('/category/{name}', 'CategoryController@show')->where('name', '[a-z]+')->name('category.show');
