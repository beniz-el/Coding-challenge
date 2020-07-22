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



Route::get('/', [
'uses' => 'productController@select',
'as' => '']);

Route::put('/addproduct', [
'uses' => 'productController@store',
'as' => 'addproduct']);

Route::get('/search', 'productController@search');

Route::get('supprimer/{id}',[
	'uses' => 'productController@supprimer',
'as' => 'supprimer']);



Route::put('/addcategory', [
'uses' => 'categoryController@store',
'as' => 'addcategory']);

Route::get('supprimer/{id}',[
	'uses' => 'categoryController@supprimer',
'as' => 'supprimer']);


