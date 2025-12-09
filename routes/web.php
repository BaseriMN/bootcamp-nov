<?php

use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () { 
    
    ## Expenses Routes
    Route::delete('expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy'); // delete
    Route::get('dashboard', [ExpenseController::class, 'index'])->name('dashboard');  // index
    Route::post('expenses', [ExpenseController::class, 'store'])->name('expenses.store');  // store
    Route::get('expenses/{expense}', [ExpenseController::class, 'edit'])->name('expenses.edit'); // edit
    Route::put('expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update'); // update



    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
});

require __DIR__.'/auth.php';
