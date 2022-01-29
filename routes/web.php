<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

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
    return view('index');
});

Route::post('/bookings', [BookingController::class, 'store']);
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('adminLogin');
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index']);
    Route::get('admin/booking', [AdminBookingController::class, 'bookingForm']);
    Route::post('admin/bookings', [AdminBookingController::class, 'store']);
    Route::post('admin/bookings/{booking}', [AdminBookingController::class, 'update']);
    Route::get('admin/bookings/confirm/{booking}', [AdminBookingController::class, 'setConfirmed']);
    Route::get('admin/bookings/delete/{booking}', [AdminBookingController::class, 'destroy']);
    Route::get('admin/logout', [AuthController::class, 'logout']);
});
