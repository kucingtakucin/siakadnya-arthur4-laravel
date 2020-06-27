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

Route::get('/', 'WelcomeController')->name('Welcome');
Auth::routes();
Route::get('/Home', 'Home\HomeController@index')->name('Home');
Route::get('/About', 'About\AboutController')->name('About');
Route::resource('Mahasiswa', 'Mahasiswa\MahasiswaController');
