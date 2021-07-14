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
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');

Route::resource('users', 'UserController');

Route::resource('candidates', 'CandidateController');

Route::get('/pilihan','ChoiceController@pilihan')->name('candidates.pilihan');
Route::put('/users/{id}/pilih','ChoiceController@pilih')->name('users.pilih');