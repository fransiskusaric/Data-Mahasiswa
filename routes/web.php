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

// ================ Student ================

Route::post('importstudent', 'DatasiswaController@importstudents');
Route::post('importteacher', 'DatasiswaController@importteachers');

Route::get('/studentinformation', 'DatasiswaController@studentpage');
Route::get('/studentinformation/fetch_student', 'DatasiswaController@fetch_student');

Route::get('/studentinformation/detailstudent/edit/{id}', 'DatasiswaController@editstudent');
Route::post('/updatestudent', 'DatasiswaController@updatestudent');

Route::get('/createstudent', 'DatasiswaController@createstudent');
Route::post('/savestudent', 'DatasiswaController@savestudent');

Route::get('/studentinformation/detailstudent/{id}', 'DatasiswaController@detailstudent');
Route::post('/savescore', 'DatasiswaController@savescore');

Route::get('/studentinformation/deletestudent/{id}', 'DatasiswaController@deletestudent');

// ================ Teacher ================

Route::get('/teacherinformation', 'DatasiswaController@teacherpage');
Route::get('/teacherinformation/fetch_teacher', 'DatasiswaController@fetch_teacher');

Route::get('/teacherinformation/editteacher/{id}', 'DatasiswaController@editteacher');
Route::post('/updateteacher', 'DatasiswaController@updateteacher');

Route::get('/createteacher', 'DatasiswaController@createteacher');
Route::post('/saveteacher', 'DatasiswaController@saveteacher');

Route::get('/teacherinformation/deleteteacher/{id}', 'DatasiswaController@deleteteacher');

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