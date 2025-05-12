<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\DoctorLoginController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\LabEmployeesLoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\PatientLoginController;
use App\Http\Controllers\Auth\RayEmployeesLoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// login user route
Route::middleware('guest')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});


Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});




// ===================== Start (Login/logout) admin route  ========================

Route::middleware('guest')->group(function () {
    Route::post('login/admin', [AdminController::class, 'store'])->name('login.admin');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('logout/admin', [AdminController::class, 'destroy'])->name('logout.admin');
});
// ===================== End (Login/logout) admin route  ========================



// ===================== Start (Login/logout) patient route  ========================
Route::middleware('guest')->group(function () {
    Route::post('login/patient', [PatientLoginController::class, 'store'])->name('login.patient');
});

Route::middleware('auth:patient')->group(function () {
    Route::post('logout/patient', [PatientLoginController::class, 'destroy'])->name('logout.patient');
});
// ===================== End (Login/logout) patient route  ========================



// ===================== Start (Login/logout) doctor route  ========================
Route::middleware('guest')->group(function () {
    Route::post('login/doctor', [DoctorLoginController::class, 'store'])->name('login.doctor');
});

Route::middleware('auth:doctor')->group(function () {
    Route::post('logout/doctor', [DoctorLoginController::class, 'destroy'])->name('logout.doctor');
});
// ===================== End (Login/logout)   doctor route  ========================



// ===================== Start (Login/logout) doctor route  ========================
Route::middleware('guest')->group(function () {
    Route::post('login/rayEmployees', [RayEmployeesLoginController::class, 'store'])->name('login.rayEmployees');
});

Route::middleware('auth:rayEmployees')->group(function () {
    Route::post('logout/rayEmployees', [RayEmployeesLoginController::class, 'destroy'])->name('logout.rayEmployees');
});
// ===================== End (Login/logout)   doctor route  ========================



// ===================== Start (Login/logout) doctor route  ========================
Route::middleware('guest')->group(function () {
    Route::post('login/labEmployees', [LabEmployeesLoginController::class, 'store'])->name('login.labEmployees');
});

Route::middleware('auth:labEmployees')->group(function () {
    Route::post('logout/labEmployees', [LabEmployeesLoginController::class, 'destroy'])->name('logout.labEmployees');
});
// ===================== End (Login/logout)   doctor route  ========================
