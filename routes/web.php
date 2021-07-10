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
    return view('login');
})->middleware('guest');

// hanya untuk tamu yg belum auth
Route::get('/login', 'App\Http\Controllers\LoginController@getLogin')->middleware('guest')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@postLogin')->name('login');
Route::post('/loginmhs', 'App\Http\Controllers\LoginController@postLoginMhs')->name('loginmhs');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::get('/signout', 'App\Http\Controllers\LoginController@signout')->name('signout');


Route::prefix('admin')->group(function () {
	Route::get('dashboard', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard')
	->middleware('auth:admin');
	Route::get('history', 'App\Http\Controllers\AdminController@history')->name('admin.history')
	->middleware('auth:admin');


	//input data
	Route::get('input/jurusan', 'App\Http\Controllers\AdminController@inputjurusan')->name('in.jurusan')
	->middleware('auth:admin');
	Route::get('input/panitia', 'App\Http\Controllers\AdminController@inputpanita')->name('in.panitia')
	->middleware('auth:admin');


	//show data
	Route::get('data/jurusan', 'App\Http\Controllers\AdminController@datajurusan')->name('data.jurusan')
	->middleware('auth:admin');
	Route::get('data/panitia', 'App\Http\Controllers\AdminController@datapanitia')->name('data.panitia')
	->middleware('auth:admin');
	Route::get('data/calon', 'App\Http\Controllers\AdminController@datacalon')->name('data.calon')
	->middleware('auth:admin');
	Route::get('data/mahasiswa', 'App\Http\Controllers\AdminController@datamahasiswa')->name('data.mahasiswa')
	->middleware('auth:admin');


	//input
	Route::post('inputjurusan', 'App\Http\Controllers\AdminActionsController@addjurusan')->name('input.jurusan')
	->middleware('auth:admin');
	Route::post('inputpanitia', 'App\Http\Controllers\AdminActionsController@addpanitia')->name('input.panitia')
	->middleware('auth:admin');


	//edit
	Route::post('editjurusan', 'App\Http\Controllers\AdminActionsController@editjurusan')->name('edit.jurusan')
	->middleware('auth:admin');
	Route::post('editpanitia', 'App\Http\Controllers\AdminActionsController@editpanitia')->name('edit.panitia')
	->middleware('auth:admin');
	Route::post('editcalon', 'App\Http\Controllers\AdminActionsController@editcalon')->name('edit.calon')
	->middleware('auth:admin');
	Route::get('resetmahasiswa/{id}', 'App\Http\Controllers\AdminActionsController@reset')->name('edit.mhs')
	->middleware('auth:admin');
	Route::get('statuspanitia/{id}', 'App\Http\Controllers\AdminActionsController@statuspanitia')->name('stat.pnt')
	->middleware('auth:admin');
	Route::get('statusjurusan/{id}', 'App\Http\Controllers\AdminActionsController@statusjurusan')->name('stat.jrs')
	->middleware('auth:admin');
	

	//delete
	Route::get('hapusjurusan/{id}', 'App\Http\Controllers\AdminActionsController@hapusjurusan')->name('hapus.jurusan')
	->middleware('auth:admin');
	Route::get('hapuspanitia/{id}', 'App\Http\Controllers\AdminActionsController@hapuspanitia')->name('hapus.panitia')
	->middleware('auth:admin');
	Route::get('hapuscalon/{id}', 'App\Http\Controllers\AdminActionsController@hapuscalon')->name('hapus.calon')
	->middleware('auth:admin');
	Route::get('hapusmahasiswa/{id}', 'App\Http\Controllers\AdminActionsController@hapusmahasiswa')->name('hapus.mahasiswa')
	->middleware('auth:admin');
	Route::get('hasil/{id}', 'AdminController@chart')->name('hasil.pemilihan')
	->middleware('auth:admin');

});


Route::prefix('panitia')->group(function () {
	Route::get('dashboard', 'PanitiaController@index')->name('panitia.dashboard')
	->middleware('auth:panitia');


	//show data
	Route::get('data/calon', 'PanitiaController@datacalon')->name('show.calon')
	->middleware('auth:panitia');
	Route::get('data/mahasiswa', 'PanitiaController@datamahasiswa')->name('show.mahasiswa')
	->middleware('auth:panitia');

	//input data
	Route::get('input/calon', 'PanitiaController@inputcalon')->name('insert.calon')
	->middleware('auth:panitia');
	Route::get('input/mahasiswa', 'PanitiaController@inputmahasiswa')->name('insert.mahasiswa')
	->middleware('auth:panitia');


	//input
	Route::post('inputcalon', 'PanitiaActionsController@addcalon')->name('input.calon')
	->middleware('auth:panitia');
	Route::post('inputmahasiswa', 'PanitiaActionsController@addmahasiswa')->name('input.mahasiswa')
	->middleware('auth:panitia');


	//edit
	Route::get('activate/{id}', 'PanitiaActionsController@activate')->name('activate')
	->middleware('auth:panitia');
	Route::get('activatecalon/{id}', 'PanitiaActionsController@activatecalon')->name('activate')
	->middleware('auth:panitia');
	Route::post('editcalon', 'PanitiaActionsController@editcalon')->name('editt.calon')
	->middleware('auth:panitia');


	//delete
	Route::get('hapuscalon/{id}', 'PanitiaActionsController@hapuscalon')->name('del.calon')
	->middleware('auth:panitia');
	Route::get('hapusmahasiswa/{id}', 'PanitiaActionsController@deletemhs')->name('del.mhs')
	->middleware('auth:panitia');

});

Route::prefix('/')->group(function () {
	Route::get('dashboard', 'HomeController@index')->name('mahasiswa.dashboard')
	->middleware('auth:mahasiswa');

	Route::post('pilih', 'MahasiswaActionsController@pilih')->name('pilih.calon')
	->middleware('auth:mahasiswa');

});