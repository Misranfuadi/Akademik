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
---------------------------------------------------------------------
Verb	        Path	                Action     	Route Name      \
---------------------------------------------------------------------
GET	        /resource	                index	    resource.index
GET	        /resource/create	        create	    resource.create
POST    	/resource	                store	    resource.store
GET	        /resource/{resource}	    show	    resource.show
GET	        /resource/{resource}/edit  	edit	    resource.edit
PUT/PATCH   /resource/{resource}	    update	    resource.update
DELETE	    /resource/{resource}	    destroy	    resource.destroy
*/

Route::get('/', 'PagesController@homepage');
Route::get('about', 'PagesController@about');

Route::group(['mileware' => 'web'], function () {
    //Route Siswa
    Route::get('siswa/cari', 'SiswaController@cari');
    Route::resource('siswa', 'SiswaController');
    //Route Kelas
    Route::get('kelas', 'KelasController@index');
    Route::get('kelas/create', 'KelasController@create');
    Route::post('kelas', 'KelasController@store');
    Route::get('kelas/{kelas}/edit', 'KelasController@edit');
    Route::patch('kelas/{kelas}', 'KelasController@update');
    Route::delete('kelas/{kelas}', 'KelasController@destroy');
});
