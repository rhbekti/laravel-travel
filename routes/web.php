<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\TouristAttractionCotroller;
use App\Http\Controllers\Admin\TravelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tourist/{tourist_attraction}', [HomeController::class, 'show'])->name('tourist.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/checkout/{booking}', [HomeController::class, 'checkout'])->name('checkout.show');
    Route::post('/checkout', [PaymentController::class, 'store'])->name('checkout.store');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart.index');

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->group(function () {
        // roles
        Route::get('/roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('roles.index');
        Route::post('/roles', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store');
        Route::put('/roles/{role}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{role}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.destroy');
        Route::get('/roles/{role}/edit', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('roles.edit');

        Route::resource('travels', TravelController::class);
        Route::resource('tourist-attractions', TouristAttractionCotroller::class);
        Route::resource('bookings', BookingController::class);

        // payment
        Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');
        Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payment.update');
        Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payment.destroy');
    });
});

require __DIR__ . '/auth.php';
