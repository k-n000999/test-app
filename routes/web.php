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
use App\Http\Controllers\CommonController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\StudentReserveController;
use App\Http\Controllers\StudentReservationStatusController;
use App\Http\Controllers\MentorTimeRegisterController;
use App\Http\Controllers\ReservationInfoController;

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [CommonController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [CommonController::class, 'login'])->name('login');

    Route::get('/register', [CommonController::class, 'showRegister'])->name('showRegister');
    Route::post('/register', [CommonController::class, 'register'])->name('register');
});

Route::post('/student/search', [TopController::class, 'search'])->name('search');

// 学生認証ルート
Route::group(['middleware' => ['auth']], function () {
    Route::post('/student/logout', [CommonController::class, 'logout'])->name('logout');

    Route::get('/student/top', [TopController::class, 'top'])->name('student_top');

    Route::get('/reserve/{id}', [StudentReserveController::class, 'showReserve'])->name('showReserve');
    Route::post('/reserve/{id}', [StudentReserveController::class, 'reserve'])->name('reserve');

    Route::get('/status/{id}', [StudentReservationStatusController::class, 'status'])->name('student_status');
    Route::post('/status/{id}/delete', [StudentReservationStatusController::class, 'delete'])->name('student_delete');
});

// メンター認証ルート
Route::group(['middleware' => ['auth']], function () {
    Route::post('/mentor/logout', [CommonController::class, 'logout'])->name('logout');

    Route::get('/mentor/top', [TopController::class, 'top'])->name('mentor_top');

    Route::get('/mentor/time', [MentorTimeRegisterController::class, 'mentor_time'])->name('mentor_time');
    Route::post('/mentor/timeSlot', [MentorTimeRegisterController::class, 'timeSlot'])->name('mentor_timeSlot');

    Route::get('/mentor/TimeList', [ReservationInfoController::class, 'showTimeList'])->name('mentor_timeList');
    Route::get('/mentor/ReservationList/{id}', [ReservationInfoController::class, 'showReservationList'])->name('mentor_reservationList');
    Route::post('/mentor/ReservationList/{id}/approve', [ReservationInfoController::class, 'approve'])->name('mentor_approve');
    Route::post('/mentor/ReservationList/{id}/delete', [ReservationInfoController::class, 'delete'])->name('mentor_delete');
});
