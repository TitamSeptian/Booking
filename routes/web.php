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
    // return view('index');
    return view('argon.welcome');
});
Route::get('/a', function () {
    return view('argon.dashboard');
})->name('home');
Route::get('/b', function () {
    return view('argon.dashboard');
})->name('register');
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
