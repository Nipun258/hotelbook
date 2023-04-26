<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile/view/', [AdminController::class, 'adminProfileView'])->name('admin.profile.view');
    Route::get('/admin/profile/edit/{id}', [AdminController::class, 'adminProfileEdit'])->name('admin.profile.edit');

    Route::patch('/admin/profile/update', [AdminController::class, 'adminProfileupdate'])->name('admin.profile.update');
    Route::get('/admin/password/change', [AdminController::class, 'adminchangePassword'])->name('admin.password.change');
    Route::put('/admin/password/change', [AdminController::class, 'adminupdateePassword'])->name('admin.password.update');

    
});
require __DIR__.'/auth.php';
