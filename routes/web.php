<?php

use App\Http\Controllers\ticketController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\reportesController;

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
    return view('welcome');
});

// == HOME ==
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('can:home')->name('home');
// == TICKET ==
Route::resource('ticket',ticketController::class)->names('ticket');
// == CATEGORIA ==
Route::resource('categoria',categoriaController::class)->names('categoria');
// == USUARIOS ==
Route::resource('usuario',usuarioController::class)->names('usuario');
// == ROLES ==
Route::resource('role',roleController::class)->names('role');
// == REPORTES ==
Route::resource('reportes',reportesController::class)->names('reportes');


Auth::routes();
Route::get('/profile', [UserSettingsController::class, 'Profile'])->name('Profile')->middleware('auth');
Route::post('/change/profile', [UserSettingsController::class, 'changeProfile'])->name('changeProfile');



