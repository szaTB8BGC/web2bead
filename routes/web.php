<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\TrailController;
use App\Http\Controllers\DiagramController;



Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/kapcsolat', [MessageController::class, 'create'])->name('contact.form');
Route::post('/kapcsolat', [MessageController::class, 'store'])->name('contact.store');


Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/uzenetek', [MessageController::class, 'index'])->name('messages.index');


    Route::get('/adatbazis', [DatabaseController::class, 'index'])->name('database.index');

  
    Route::resource('trails', TrailController::class);


    Route::get('/diagram', [DiagramController::class, 'index'])->name('diagram.index');

 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');
});

require __DIR__.'/auth.php';