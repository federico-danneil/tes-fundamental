<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    // CRUD utama employees
    Route::resource('employees', EmployeeController::class);

    // Halaman restore & actions
    Route::get('/employees-deleted', [EmployeeController::class, 'deleted'])
        ->name('employees.deleted'); 

    Route::post('/employees/{id}/restore', [EmployeeController::class, 'restore'])
        ->name('employees.restore');

    Route::delete('/employees/{id}/force-delete', [EmployeeController::class, 'forceDelete'])
        ->name('employees.force-delete');
});

require __DIR__.'/auth.php';
