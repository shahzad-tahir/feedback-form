<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleQRController;
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

Route::get('/', function () {
    $vehicles = VehicleQR::get()->count();
    return view('dashboard',compact('vehicles'));
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    $vehicles = VehicleQR::get()->count();
    return view('dashboard',compact('vehicles'));
})->middleware(['auth'])->name('dashboard');

//feedback
Route::get('/vehicle-feedback/{vehicleQR}', [FeedbackController::class, 'index'])->name('vehicle-feedback');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //vehicle QR codes
    Route::resource('vehicle-qr', VehicleQRController::class)->except(['update','show','edit']);
    Route::get('/vehicle-qr/print/{vehicleQR}', [VehicleQRController::class, 'print'])->name('vehicle-qr.print');
});

require __DIR__.'/auth.php';
