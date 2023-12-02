<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {
    //Route::get('/dashboard', [RegisteredUserController::class, 'dashboard'])->name('dashboard');
    Route::get('/students-list', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students-create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students-store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students-edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students-update', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students-show/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::delete('/students-destroy/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

