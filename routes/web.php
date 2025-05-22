<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('Students', [\App\Http\Controllers\StudentController::class, 'index'])->name('Students.index');

    Route::get('Students/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('Students.create');
    Route::post('Students', [\App\Http\Controllers\StudentController::class, 'store'])->name('Students.store');

    Route::get('Students/{id}/edit', [\App\Http\Controllers\StudentController::class, 'edit'])->name('Students.edit');
    Route::put('Students/{id}/edit', [\App\Http\Controllers\StudentController::class, 'update'])->name('Students.update');

    Route::get('Students/{id}/delete}', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('Students.delete');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
