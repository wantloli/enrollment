<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentPeriodController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\EnrollmentStatusController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/form', [FormController::class, 'create'])->name('form.create');
Route::post('/form', [FormController::class, 'store'])->name('form.store');

Route::get('/thank-you', [FormController::class, 'thankYou'])->name('form.thank-you');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.showLoginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/teachers', TeacherController::class)->except('show');
    Route::get('/teachers/{teacher}/account/create', [TeacherController::class, 'createAccount'])->name('teachers.account.create');

    Route::delete('/delete-database', [DatabaseController::class, 'deleteDatabase'])->name('delete.database');
    Route::post('/migrate-database', [DatabaseController::class, 'migrateDatabase'])->name('migrate.database');

    Route::get('/logs', [LogController::class, 'showLogs'])->name('logs');
});

Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::put('/enrollment-period/{enrollmentPeriod}', [EnrollmentPeriodController::class, 'update'])->name('enrollment-period.update');
});
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

    // Export route should come before other enrollment routes with parameters
    Route::get('/enrollments/export', [EnrollmentController::class, 'export'])->name('enrollments.export');
    Route::get('/enrollments/pending', [EnrollmentController::class, 'pending'])->name('enrollments.pending');
    Route::get('/enrollments/reviewed', [EnrollmentController::class, 'reviewed'])->name('enrollments.reviewed');
    Route::post('/enrollments/{enrollment}/reviewed', [EnrollmentStatusController::class, 'markReviewed'])->name('enrollments.mark-reviewed');
    Route::post('/enrollment/{enrollment}/rejected', [EnrollmentStatusController::class, 'markRejected'])->name('enrollments.mark-rejected');
    Route::get('/enrollments/enrolled', [EnrollmentController::class, 'enrolled'])->name('enrollments.enrolled');
    Route::get('/enrollments/rejected', [EnrollmentController::class, 'rejected'])->name('enrollments.rejected');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/change-password', [SettingController::class, 'changePassword'])->name('settings.change-password');
    Route::put('/settings/change-password', [SettingController::class, 'updatePassword'])->name('settings.update-password');

    // General enrollment routes should come after specific ones
    Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/enrollments/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollments.show');
    Route::get('/enrollments/{enrollment}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
    Route::get('/enrollments/{enrollment}/reject', [EnrollmentController::class, 'reject'])->name('enrollments.reject');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/403', [ErrorController::class, 'forbidden'])->name('error.403');

Route::fallback(function () {
    return redirect()->route('home.index');
});
