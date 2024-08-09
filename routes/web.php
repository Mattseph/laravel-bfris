<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Or
// Route::group('prefix' => '/resident', function () {
// });
Route::prefix('/resident')->group(function () {
    Route::get('/', [ResidentController::class, 'index'])->name('resident.index');
    Route::get('/create', [ResidentController::class, 'create'])->name('resident.create');
    Route::post('/', [ResidentController::class, 'store'])->name('resident.store');
    Route::get('/{resident}/edit', [ResidentController::class, 'edit'])->whereNumber('id')->name('resident.edit');
    Route::put('/{resident}', [ResidentController::class, 'update'])->name('resident.update');
    Route::get('/{resident}', [ResidentController::class, 'show'])->whereNumber('id')->name('resident.show');
    Route::delete('/{resident}', [ResidentController::class, 'destroy'])->name('resident.destroy');
})->middleware('auth');
