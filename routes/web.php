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

Auth::routes();

//Rotas Escolas

// Route::get('/teste', 'EscolaController@create')->middleware('auth');
// Route::post('/get-cities/{uf}', 'EscolaController@getCities')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/school/search/list/{status}', 'SchoolController@list')->middleware('auth');
Route::get('user/search/list/{status}', 'UserController@list')->middleware('auth');
Route::get('/schoolclass/search/list/{status}', 'SchoolClassController@list')->middleware('auth');
Route::get('/teacher/search/list/{status}', 'TeacherController@list')->middleware('auth');
Route::get('/book/search/list/{status}', 'BookController@list')->middleware('auth');
Route::get('book/apresentacao/create', 'BookController@createApresentacao')->middleware('auth');
Route::resource('school', 'SchoolController')->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
Route::resource('schoolclass', 'SchoolClassController')->middleware('auth');
Route::resource('book', 'BookController')->middleware('auth');
Route::resource('teacher', 'TeacherController')->middleware('auth');
