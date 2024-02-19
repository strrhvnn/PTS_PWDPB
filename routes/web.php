<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:admin')->group(function () {
    Route::get('admin.dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('admin.laporan', [AdminController::class, 'show'])->name('admin.laporan');

    Route::get('add.vehicle', [VehicleController::class, 'create'])->name('add.vehicle');
    Route::post('add.vehicle.post', [VehicleController::class, 'store'])->name('add.vehicle.post');

    Route::get('edit.vehicle/{id}', [VehicleController::class, 'edit'])->name('edit.vehicle');
    Route::post('edit.vehicle.post/{id}', [VehicleController::class, 'update'])->name('edit.vehicle.post');

    Route::post('delete.vehicle/{id}', [VehicleController::class, 'delete'])->name('delete.vehicle');

    Route::get('admin.confirm/{id}', [BookingController::class, 'confirm'])->name('admin.confirm');
});

Route::middleware('role:user')->group(function () {
    Route::get('user.dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('user.customer', [CustomerController::class, 'index'])->name('user.customer');
    Route::post('user.customer.post', [CustomerController::class, 'store'])->name('user.customer.post');

    Route::get('user.edit.vehicle/{id}', [CustomerController::class, 'edit'])->name('user.edit.customer');
    Route::post('user.edit.vehicle.post/{id}', [CustomerController::class, 'update'])->name('user.edit.customer.post');

    Route::post('user.delete.vehicle/{id}', [CustomerController::class, 'delete'])->name('user.delete.customer');

    Route::get('user.booking/{id}', [BookingController::class, 'index'])->name('user.booking');

    Route::get('user.booking.list', [BookingController::class, 'show'])->name('user.booking.list');

    Route::post('user.booking.post', [BookingController::class, 'store'])->name('user.booking.post');
});



require __DIR__.'/auth.php';
