<?php

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
use App\Http\Controllers\EsaController;

Route::get('/', [EsaController::class, 'top'])->name('top');

Route::get('/sign_up', [EsaController::class, 'sign_up'])->name('sign_up');
Route::post('/create', [EsaController::class, 'create'])->name('create');

Route::post('/search', [EsaController::class, 'search'])->name('search');

Route::get('/edit/{id}', [EsaController::class, 'edit'])->name('edit');
Route::post('/update', [EsaController::class, 'update'])->name('update');

Route::post('/delete/{id}', [EsaController::class, 'delete'])->name('delete');

Route::get('/login', [EsaController::class, 'login'])->name('login');
