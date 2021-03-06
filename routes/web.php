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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pilihan','ChoiceController@pilihan')->name('candidates.pilihan');
Route::get('/export/user','ExportController@exportuser')->name('export.user');
Route::get('/export/candidate','ExportController@exportcandidate')->name('export.candidate');
Route::get('/export/result','ExportController@exportresult')->name('export.result');

Route::put('/users/{id}/pilih','ChoiceController@pilih')->name('users.pilih');

Route::resource('users', 'UserController');
Route::resource('candidates', 'CandidateController');