<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VehicleQRController;
use App\Models\Feedback;
use App\Models\VehicleQR;
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

Route::get('/', [DashboardController::class, 'index'])->name('index')
    ->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

//feedback
Route::get('/feedback/{vehicleQR}', [FeedbackController::class, 'show'])->name('feedback.show');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/feedback-success', [FeedbackController::class, 'success'])->name('feedback.success');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //vehicle QR codes
    Route::resource('vehicle-qr', VehicleQRController::class)->except(['update','show','edit']);
    Route::get('/vehicle-qr/print/{vehicleQR}', [VehicleQRController::class, 'print'])->name('vehicle-qr.print');

    //feedbacks
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
    Route::get('/feedback-detail/{feedback}', [FeedbackController::class, 'detail'])->name('feedback.detail');

    //reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/generate', [ReportController::class, 'generate'])->name('reports.generate');
});

require __DIR__.'/auth.php';
