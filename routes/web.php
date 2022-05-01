<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\TugasController;

//---Auth:
//--Cara Routing dari Traversy Tutorial:
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
//
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@store');
//
Route::get('logout', 'Auth\LogoutController@store')->name('logout');

//--Dashboard CMS:
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//--Account -- Access from Admin :
Route::get('account', 'AccountController@index');
Route::get('account/profile', 'AccountController@index');
Route::get('account/{id}/edit', 'AccountController@edit');
Route::match(['get','post'], 'account/{id}/changepass', 'AccountController@changepass');

//--My Account -- Access from FrontEnd:
Route::get('my-account', 'MyAccountController@index');
Route::get('my-account/{id}/edit', 'MyAccountController@edit');
Route::patch('my-account/{id}', 'MyAccountController@update');
Route::match(['get','post'], 'my-account/changepass', 'MyAccountController@changepass');

//--Frontend landing page:
Route::get('/', [WebController::class, 'index']);
Route::get('/map', [WebController::class, 'map']);

//--Admin/Kecamatan:
Route::get('admin/kecamatan', 'Admin\KecamatanController@index')->name('kecamatan');
Route::get('admin/kecamatan/create', 'Admin\KecamatanController@create');

//--Admin/Sekolah:
Route::resource('admin/sekolah', 'Admin\SekolahController');
Route::post('admin/sekolah/upload-file/{id}', 'Admin\SekolahController@uploadFile');
Route::post('admin/sekolah/remove-file/{id}', 'Admin\SekolahController@removeFile');

//--Admin/Category:
Route::resource('category', 'CategoryController');

//--Admin/Post:
Route::get('post/trashedbin', 'PostController@trashedBin')->name('post.trashedbin');
Route::get('post/restore/{id}', 'PostController@restore')->name('post.restore');
Route::delete('post/kill/{id}', 'PostController@kill')->name('post.kill');
Route::resource('post', 'PostController');

//---TUGAS & MATERI APPS:
//--Admin/Materi:
Route::resource('admin/materi', 'Admin\MateriController');

//--TUGAS:
Route::get('tugas/upload', [TugasController::class, 'uploadForm']);
Route::post('tugas/upload', [TugasController::class, 'submitUpload']);

//--Dashboard:
Route::get('mhz', 'MHzController@index')->name('mhz');

//--User/Member:
Route::resource('admin/user', 'Admin\UserController');
Route::match(['get','post'], 'admin/user/{id}/changepass', 'Admin\UserController@changepass');
// Route::get('admin/user/create', 'Admin\UserController@create');

