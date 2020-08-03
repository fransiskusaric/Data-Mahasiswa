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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/mahasiswa', 'mahasiswacontroller');

Route::get('importView', 'DatabaseController@importView');
Route::post('import', 'DatabaseController@import')->name('import');

Route::group([], function(){
    Route::get('search', 'mahasiswacontroller@index');
    Route::post('mahasiswaview', 'mahasiswacontroller@mahasiswarequest')->name('mahasiswarequest');
});

Route::get('editMhs/{id}', 'mahasiswacontroller@editMhs');
Route::post('updateMhs', 'mahasiswacontroller@updateMhs');

Route::get('createMhs', 'mahasiswacontroller@createMhs');
Route::post('storeData', 'mahasiswacontroller@storeData');

Route::get('deleteMhs/{id}', 'mahasiswacontroller@deleteMhs');

Route::get('filterMhs/{TglFilter}/{TglMasuk}/{TglKeluar}', 'mahasiswacontroller@index');