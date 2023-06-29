<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
});

Route::prefix('/group')->group(function() {
    Route::get('/crud', [PostController::class, 'index'])->name('group.index');
    Route::post('/store', [PostController::class, 'store'])->name('group.store');
    Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('group.destroy');
    Route::put('/post/{post}', [PostController::class, 'update'])->name('group.update');
});

Route::prefix('/manager')->group(function() {
    Route::get('/tasks', [TaskController::class, 'index'])->name('manager.index');
    Route::post('/store', [TaskController::class, 'store'])->name('manager.store');
    Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->name('manager.destroy');
    Route::put('/edit/{task}', [TaskController::class, 'update'])->name('manager.update');
});


require __DIR__.'/auth.php';
