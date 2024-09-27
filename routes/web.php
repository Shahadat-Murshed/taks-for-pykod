<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/projects/deleted-projects', [ProjectController::class, 'deletedList'])->name('projects.deleted');
    Route::get('/projects/restore/{id}', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::resource('/projects', ProjectController::class);
});

require __DIR__ . '/auth.php';
