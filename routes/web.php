<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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
//-Dashboard:
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//--Auth:
//--Cara Routing dari Traversy Tutorial:
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
//
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@store');
//
Route::get('logout', 'Auth\LogoutController@store')->name('logout');

// Route::get('register', 'RegisterController@index')->name('register');
// Route::post('register', 'RegisterController@store');

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

//--Category:
Route::resource('category', 'CategoryController');
//--Post:
Route::get('post/trashedbin', 'PostController@trashedBin')->name('post.trashedbin');
Route::get('post/restore/{id}', 'PostController@restore')->name('post.restore');
Route::delete('post/kill/{id}', 'PostController@kill')->name('post.kill');
Route::resource('post', 'PostController');
