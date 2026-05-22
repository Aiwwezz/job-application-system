<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ApplicantController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('apply.create');
});

Route::get('/apply', [ApplicantController::class, 'create'])
    ->name('apply.create');

Route::post('/apply', [ApplicantController::class, 'store'])
    ->name('apply.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('departments', DepartmentController::class);

    Route::get('/admin/applicants', [ApplicantController::class, 'index'])
        ->name('admin.applicants.index');

    Route::get('/admin/applicants/{id}', [ApplicantController::class, 'show'])
        ->name('admin.applicants.show');

    Route::get('/admin/applicants/{id}/print', [ApplicantController::class, 'print'])
        ->name('admin.applicants.print');

    Route::post('/admin/applicants/{id}/status', [ApplicantController::class, 'updateStatus'])
        ->name('admin.applicants.status');

    Route::delete('/admin/applicants/{id}', [ApplicantController::class, 'destroy'])
        ->name('admin.applicants.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
