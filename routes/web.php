<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


Route::get('/', function () {
    return view('welcome');
});




Route::get('/program', fn() => view('program'))->name('program');
Route::get('/universities', fn() => view('universities'))->name('universities');
/*Route::get('/resources', fn() => view('resources'))->name('resources');*/



Route::get('/covers/{filename}', [BlogController::class, 'cover'])->name('covers.show');



Route::get('/resources', [BlogController::class, 'index'])->name('resources.index');
Route::get('/resources/{slug}', [BlogController::class, 'show'])->name('resources.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
