<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pegawai', 'pcontroller@index')->middleware('auth.basic');
Route::get('/pegawai/create', 'pcontroller@create')->middleware('auth', 'hanya.admin');

Route::post('/pegawai', 'pcontroller@store')->middleware('auth');
Route::get('/pegawai/{id}', 'pcontroller@show')->middleware('auth');



Route::get('/pegawai/{id}/edit', 'pcontroller@edit')->middleware('auth', 'hanya.admin');

Route::post('/pegawai/{id}', 'pcontroller@update')->middleware('auth');
Route::delete('/pegawai/{id}/delete', 'pcontroller@destroy')->middleware('auth');

Route::get('/pegawai-pagination', 'pcontroller@paginationtest')->middleware('auth');

Route::post('/search', 'pcontroller@search')->middleware('auth');
