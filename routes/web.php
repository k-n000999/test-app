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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [EsaController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [EsaController::class, 'login'])->name('login');

    Route::get('/register', [EsaController::class, 'showRegister'])->name('showRegister');
    Route::post('/register', [EsaController::class, 'register'])->name('register');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [EsaController::class, 'top'])->name('top');

    Route::post('/search', [EsaController::class, 'search'])->name('search');

    Route::get('/sign_up', [EsaController::class, 'sign_up'])->name('sign_up');
    Route::post('/create', [EsaController::class, 'create'])->name('create');

    Route::get('/edit/{id}', [EsaController::class, 'edit'])->name('edit');
    Route::post('/update', [EsaController::class, 'update'])->name('update');

    Route::post('/delete/{id}', [EsaController::class, 'delete'])->name('delete');

    Route::post('logout', [EsaController::class, 'logout'])->name('logout');
});
