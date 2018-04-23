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
	if(Auth::user()){ 
     	if(Auth::user()->hak_akses=="admin"){ 
    		return view('home');
     	}else{ 
    		return view('user'); 
    	} 
    } 
    else{ 
        return view('login'); 
    }
});

Route::get('/home','Crudcontroller@index');

Route::get('mahasiswa/tambah','Crudcontroller@tambah');

Route::post('prosestambah','Crudcontroller@tambahdata');

Route::get('mahasiswa','Crudcontroller@lihatdata');

Route::get('mahasiswa/hapus/{id}','Crudcontroller@hapusdata');

Route::get('mahasiswa/edit/{id}','Crudcontroller@editdata');

Route::post('prosesedit','Crudcontroller@proseseditdata');

Route::get('mahasiswa/data','Crudcontroller@search');

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::post('login','Crudcontroller@login');

Route::post('tambahlogin','Crudcontroller@tambahlogin');

Route::get('logout','Crudcontroller@logout');

// Route for Jurusan

Route::get('jurusan','JurusanController@index');

Route::get('jurusan/tambah','JurusanController@create');

Route::post('jurusantambahdata','JurusanController@store');

Route::get('jurusan/edit/{id}','JurusanController@edit');

Route::post('jurusaneditdata','JurusanController@update');

Route::get('jurusan/delete/{id}','JurusanController@destroy');

Route::get('jurusan/data','JurusanController@search');