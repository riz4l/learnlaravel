<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home','Crudcontroller@index');

Route::get('formtambah','Crudcontroller@tambah');

Route::post('prosestambah','Crudcontroller@tambahdata');

Route::get('read','Crudcontroller@lihatdata');

Route::get('hapus/{id}','Crudcontroller@hapusdata');

Route::get('formedit/{id}','Crudcontroller@editdata');

Route::post('prosesedit','Crudcontroller@proseseditdata');