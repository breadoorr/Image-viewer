<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TypeController;
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
//
Route::get('/', [HomeController::class, 'index'])->name('home');
//
Route::resource('properties', PropertyController::class);
Route::resource('types', TypeController::class);
Route::resource('areas', AreaController::class);
