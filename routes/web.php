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

// Route::get('/home', function () {
//     return view('welcome');
// });

Route::get('/novedades', function () {
    return view('noticias');
    });
Route::get('/auth/register', function () {
    return view('auth.register');
    });
Route::get('/auth/login', function () {
    return view('inicio');
    });
Route::get('/Faqs', function () {
    return view('Faqs');
    });
Route::get('/home', function () {
    return view('inicio');
});

Route::get('/index', function() {
    return view('index');
});

Auth::routes();

 Route::get('index', 'AdminController@admin');
 //Route::match(['get', 'post'], 'admin/createadmin', 'AdminController@createAdmin');
Route::get('/', 'HomeController@index')->name('home');
Route::resource('usuarios', 'UserController');
