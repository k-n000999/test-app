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



// 学生認証ルート
Route::group(['middleware' => ['auth']], function () {
    Route::get('/student/top', [EsaController::class, 'top'])->name('student_top');
    Route::post('/student/logout', [EsaController::class, 'logout'])->name('logout');

    Route::get('/reserve/{id}', [EsaController::class, 'showReserve'])->name('showReserve');
    Route::post('/reserve/{id}', [EsaController::class, 'reserve'])->name('reserve');

    Route::get('/status/{id}', [EsaController::class, 'Status'])->name('student_Status');
    Route::post('/status/{id}/delete', [EsaController::class, 'delete'])->name('student_delete');
});


Route::post('/student/search', [EsaController::class, 'search'])->name('search');
Route::post('/student/delete/{id}', [EsaController::class, 'delete'])->name('delete');


// メンター認証ルート
Route::group(['middleware' => ['auth']], function () {
    Route::get('/mentor/top', [EsaController::class, 'top'])->name('mentor_top');
    Route::post('/mentor/logout', [EsaController::class, 'logout'])->name('logout');

    Route::get('/mentor/time', [EsaController::class, 'mentor_time'])->name('mentor_time');
    Route::post('/mentor/timeslot', [EsaController::class, 'timeslot'])->name('mentor_timeslot');
    Route::get('/mentor/Timelist', [EsaController::class, 'showTimelist'])->name('mentor_Timelist');

    Route::get('/mentor/Reservationlist/{id}', [EsaController::class, 'showReservationlist'])->name('mentor_Reservationlist');
    Route::post('/mentor/Reservationlist/{id}/approve', [EsaController::class, 'approve'])->name('mentor_approve');
    Route::post('/mentor/Reservationlist/{id}/delete', [EsaController::class, 'delete'])->name('mentor_delete');
});
