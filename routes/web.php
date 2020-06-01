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
Route::get('/','IndexController@index');
// Route::post('input/fetch','InputController@fetch')->name('option.fetch');
// Route::resource('input','InputController');
Route::get('input', 'InputController@index');
Route::get('ajax-sub','InputController@search');
Route::post('input','InputController@store');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->middleware('auth');
Route::resource('sumbang-saran', 'SumbangSaranController')->middleware('auth');
Route::resource('karyawan','KaryawanController')->middleware('auth');
Route::resource('penilaian','PenilaianController')->middleware('auth');
Route::resource('peserta-terbaik','PesertaTerbaikController')->middleware('auth');
Route::resource('jadwal','JadwalController')->middleware('auth');
Route::resource('bagian', 'BagianController')->middleware('auth');
Route::resource('extension', 'ExtController')->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
