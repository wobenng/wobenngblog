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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('signup', 'UserController@create')->name('signup');
Route::resource('users', 'UserController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destory')->name('logout');

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

Route::get('/Htmlarticles', 'ArticlesController@showHtml')->name('Htmlarticles');
Route::get('/Cssarticles', 'ArticlesController@showCss')->name('Cssarticles');
Route::get('/Jsarticles', 'ArticlesController@showJs')->name('Jsarticles');
Route::get('/Otherarticles', 'ArticlesController@showOther')->name('Otherarticles');

Route::get('/Htmlarticles/{htmlid}', 'ArticlesController@showHtmlArticle')->name('showHtmlArticle');

Route::post('/comments/{htmlid}', 'CommentsController@store')->name('comments.store');




