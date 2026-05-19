<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\CropProgressController;

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard',
        [AdminController::class, 'dashboard'])
        ->middleware('role:admin');

    Route::get('/farmer/dashboard',
        [FarmerController::class, 'dashboard'])
        ->middleware('role:farmer');

    Route::get('/expert/dashboard',
        [ExpertController::class, 'dashboard'])
        ->middleware('role:expert');

    Route::resource('farms', FarmController::class);

    Route::resource('fields', FieldController::class);

    Route::resource('crop-progress', CropProgressController::class);
});

Route::get('/dashboard', function () {

    if (auth()->user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }

    if (auth()->user()->role == 'expert') {
        return redirect('/expert/dashboard');
    }

    return redirect('/farmer/dashboard');

})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';