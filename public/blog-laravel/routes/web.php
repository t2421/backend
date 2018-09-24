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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','can:user-higher']],function(){
    Route::get('/account','AccountController@index')->name('account.index');
    Route::get('/articles','ArticleController@index')->name('article.index');
    Route::get('/articles/create','ArticleController@create')->name('article.create');
    Route::post('/articles/create','ArticleController@store')->name('article.create');
    Route::get('/articles/edit/{id}','ArticleController@edit')->name('article.edit');
    Route::post('/articles/edit','ArticleController@update')->name('article.edit');
    Route::get('/articles/delete/{id}','ArticleController@show')->name('article.edit');
    Route::post('/articles/delete/','ArticleController@delete')->name('article.delete');
});

Route::group(['middleware'=>['auth','can:admin-higher']],function(){
    Route::get('/account/regist','AccountController@regist')->name('account.regist');
    Route::post('/account/regist','AccountController@createData')->name('account.regist');
});