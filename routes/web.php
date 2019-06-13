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

//Route::get('/admin', 'AdminController@index');
Route::get('/admin/detail', 'DetailtiketController@detail');

Route::post('/detailAction','DetailtiketController@add_Detail');

Route::get('/admin/hapus/{id}','DetailtiketController@delete_Detail');

Route::get('/admin/detail/edit/{id}','DetailtiketController@edit_Detail');

Route::post('/admin/detail/update','DetailtiketController@detail_Update');

//Route pegawai
Route::get('/admin/pegawai', 'PegawaiController@pegawai');

Route::post('/pegawaiAction', 'PegawaiController@add_Pegawai');

Route::get('/admin/hapus/{id}', 'PegawaiController@delete_Pegawai');

//Route Bus
Route::get('/admin/bus', 'BusController@bus');

//Route tiket
Route::get('/admin/tiket', 'TiketController@tiket');
