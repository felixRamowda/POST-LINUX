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

Route::get('/', 'PageController@posts')->name('POST');
Route::get('blog/{post}', 'PageController@post')->name('post');
/**
 * 'blog/{post}'     hace referencia al parametro post en el controlador: PageController
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//CREANDO LA PARTE PRIVADA DEL PRPOYECTO

Route::resource('posts','Backend\PostController')
->middleware('auth')
->except('show');   //exceptuamos el 'show' por que hace parte de el area publica
