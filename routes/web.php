<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {

    // Profile Page
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Resident Page
    Route::prefix('/resident')->group(function () {

        Route::get('/', [ResidentController::class, 'index'])->name('resident.index');
        Route::get('/create', [ResidentController::class, 'create'])->name('resident.create');
        Route::get('/{resident}', [ResidentController::class, 'show'])->name('resident.show');
        Route::post('/', [ResidentController::class, 'store'])->name('resident.store');
        Route::get('/{resident}/edit', [ResidentController::class, 'edit'])->name('resident.edit');
        Route::put('/{resident}', [ResidentController::class, 'update'])->name('resident.update');
        Route::delete('/', [ResidentController::class, 'destroy'])->name('resident.destroy')->middleware('password.confirm');
    });

});
