<?php

use App\Http\Controllers\admin\PemesananController;
use App\Http\Controllers\admin\PenggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\AuthController as UserAuthController;
use App\Http\Controllers\admin\VehicleController;
use App\Http\Controllers\admin\MotorController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\CheckRole;

Route::get('/', [RentalController::class, 'index'])->name('home1');
Route::get('/detail', [RentalController::class, 'detail']);
Route::get('/rent/{id}', [RentalController::class, 'detail'])->name('motor.detail');
Route::post('/rent', [RentalController::class, 'rent'])->name('rent.motor'); // Menyimpan data
Route::get('/rentmobil/{id}', [RentalController::class, 'detailvehicles'])->name('mobil.detail');
Route::post('/rentmobil', [RentalController::class, 'rent'])->name('rent.mobil'); // Menyimpan data
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


//Routes Login Admin
Route::get('admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('admin/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('admin/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('admin/register', [AuthController::class, 'register'])->name('register');


//Routes Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('home');
    Route::resource('vehicles', VehicleController::class);
    Route::resource('motors', MotorController::class);
    Route::resource('pemesanan', PemesananController::class);
    Route::resource('pengguna', PenggunaController::class);
});

//Routes LoginUser
Route::get('login', [UserAuthController::class, 'showLoginForm'])->name('loginuser');
Route::post('login', [UserAuthController::class, 'login']);
Route::get('register', [UserAuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [UserAuthController::class, 'register'])->name('registerUser');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout')->middleware('auth');

// //Routes Payment
// Route::post('/payment/snap-token', [PaymentController::class, 'createSnapToken']);
// Route::post('/payment/create-order', [PaymentController::class, 'createOrder']);
// Route::post('/payment/validate', [PaymentController::class, 'notificationHandler']);

// // Untuk mobil
// Route::post('/payment/snap-token-mobil', [PaymentController::class, 'createSnapTokenMobil']);
