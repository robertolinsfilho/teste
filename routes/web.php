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

Route::resource('products','ProductController');
Route::resource('categories','CategorieController');
Route::resource('brands','BrandController');
Route::resource('users','UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/','HomeController@logout')->name('logout');

Route::get('/produtos','ProductController@check')->name('products.index');
Route::get('/usuarios','UserController@check')->name('users.index');
Route::get('/marcas','BrandController@check')->name('brands.index');
Route::get('/categorias','CategorieController@check')->name('categories.index');


