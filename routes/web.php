<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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



Route::get('/', [UserController::class, 'show'])->name('user');

Route::post('/add', [UserController::class, 'add'])->name('add');
Route::get('/', [UserController::class, 'getData'])->name('data');
Route::get('/edit{id}', [UserController::class, 'editData'])->name('edit');
Route::post('/edit/update{id}', [UserController::class, 'updateData'])->name('update');
