<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;

// Landing Page Route
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/tasks'); // Redirect authenticated users to their tasks
    }
    return view('landing'); // Show the landing page for unauthenticated users
})->name('landing');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup')->middleware('guest');
Route::post('/signup', [AuthController::class, 'signup'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/calendar', [CalendarController::class, 'index'])->name('tasks.calendar');
    Route::resource('tasks', TaskController::class);
    Route::resource('timesheets', TimesheetController::class);
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/data', [ReportController::class, 'chartData'])->name('report.data');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/export/timesheets', [ExportController::class, 'exportTimesheets'])->name('export.timesheets');
});