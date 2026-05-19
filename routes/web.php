<?php

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// ── PUBLIC WEBSITE ──────────────────────────────────
Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/services', [WebsiteController::class, 'services'])->name('services');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact', [WebsiteController::class, 'submitLead'])->name('lead.submit');

// ── ADMIN PANEL ──────────────────────────────────────
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('leads', LeadController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('services', ServiceController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');