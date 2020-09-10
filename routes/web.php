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
    return view('homepage');
});

Route::post('importstudent', 'DatasiswaController@importstudents');
Route::post('importteacher', 'DatasiswaController@importteachers');

Route::get('/studentinformation', 'DatasiswaController@studentpage');
Route::get('/studentinformation/fetch_student', 'DatasiswaController@fetch_student');

Route::get('/teacherinformation', 'DatasiswaController@teacherpage');
Route::get('/teacherinformation/fetch_teacher', 'DatasiswaController@fetch_teacher');

Route::get('/studentinformation/editstudent/{id}', 'DatasiswaController@editstudent');
Route::post('/updatestudent', 'DatasiswaController@updatestudent');

Route::get('/teacherinformation/editteacher/{id}', 'DatasiswaController@editteacher');
Route::post('/updateteacher', 'DatasiswaController@updateteacher');

// Route::resource('/mahasiswa', 'mahasiswacontroller');

// Route::get('importView', 'DatabaseController@importView');
// Route::post('import', 'DatabaseController@import')->name('import');

// Route::group([], function(){
//     Route::get('search', 'mahasiswacontroller@index');
//     Route::post('mahasiswaview', 'mahasiswacontroller@mahasiswarequest')->name('mahasiswarequest');
// });

// Route::get('editMhs/{id}', 'mahasiswacontroller@editMhs');
// Route::post('updateMhs', 'mahasiswacontroller@updateMhs');

// Route::get('createMhs', 'mahasiswacontroller@createMhs');
// Route::post('storeData', 'mahasiswacontroller@storeData');

// Route::get('deleteMhs/{id}', 'mahasiswacontroller@deleteMhs');

// Route::get('filterMhs/{TglFilter}/{TglMasuk}/{TglKeluar}', 'mahasiswacontroller@index');