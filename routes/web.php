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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('index');
    return view('argon.welcome');
});
// Route::get('/a', function () {
//     return view('argon.dashboard');
// })->name('home');

Route::get('/c', function () {
    return view('argon.dashboard');
})->name('login');

Route::get('/v', function () {
    return view('argon.dashboard');
})->name('profile.edit');

Route::get('/logout', function () {
    return view('argon.dashboard');
})->name('logout');

Route::get('/user', function () {
    return view('argon.dashboard');
})->name('user.index');
// Route::get('/user', function () {
//     return view('argon.dashboard');
// })->name('user.index');

Auth::routes();

Route::get('/register', function () {
    return view('argon.auth.register');
})->middleware('guest')->name('register');

Route::get('/login', function () {
    return view('argon.auth.login');
})->middleware('guest')->name('login');

Route::get('/dashboard', 'MixController@dashboard')->middleware('auth')->name('home');
// Route::post('/p/register', 'OAuthController@postRegister')->middleware('guest')->name('postRegister');

Route::resource('tempat', 'TempatController');
Route::get('t/data', 'TempatController@data')->name('tempat.data');