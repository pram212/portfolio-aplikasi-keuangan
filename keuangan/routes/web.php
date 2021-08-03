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

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/kategori', 'KategoriController');
Route::get('/transaksi/pencarian', 'TransaksiController@pencarian');
Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/filter', 'LaporanController@filter');
Route::get('/laporan/print', 'LaporanController@printLaporan');
Route::get('/laporan/excel', 'LaporanController@exportExcel');
Route::resource('/transaksi', 'TransaksiController');
Route::get('', 'GantiPasswordController@form');
