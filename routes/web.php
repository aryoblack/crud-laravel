<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/soals', \App\Http\Controllers\SoalController::class);
Route::resource('/indikators', \App\Http\Controllers\IndikatorController::class);
Route::get('/', function () {
    return view('welcome');
});
