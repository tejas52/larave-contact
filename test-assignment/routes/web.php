<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactImportController;

Route::resource('contacts', ContactController::class);


Route::get('/contactsdata/import', [ContactImportController::class, 'showImportForm'])->name('contacts.import');
Route::post('/contactsdata/import', [ContactImportController::class, 'import'])->name('contacts.import.process');

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
