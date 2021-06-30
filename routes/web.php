<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/post/search', 'PostController@search')->name('post.search');

Route::get('/posts', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('/post', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('/post/{id}', 'PostController@show')->name('post.show');
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::put('/post/{id}', 'PostController@update')->name('post.update')->middleware('auth');
Route::delete('/post/destroy/{id}', 'PostController@destroy')->name('post.destroy')->middleware('auth');
//Route::resource('post', 'PostController')->middleware('auth');

Route::get('/categories', 'CategoryController@index')->name('category.index');
Route::get('/category/{slug}', 'CategoryController@show')->name('category.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.home');
Route::get('/home/profile', 'HomeController@profile')->name('home.profile');
Route::get('/home/post/create', 'PostController@create')->name('home.create');
Route::get('/home/report', 'HomeController@report')->name('home.report')->middleware('auth');
