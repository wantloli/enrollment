<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentPeriodController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/form', [FormController::class, 'create'])->name('form.create');
Route::post('/form', [FormController::class, 'store'])->name('form.store');

Route::get('/thank-you', [FormController::class, 'thankYou'])->name('form.thank-you');

Route::put('/enrollment-period/{enrollmentPeriod}', [EnrollmentPeriodController::class, 'update'])->name('enrollment-period.update');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.showLoginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

Route::fallback(function () {
    return redirect()->route('home.index');
});
