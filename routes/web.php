<?php

use App\Http\Controllers\CustomerPanel\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\VendorPanel\VendorController;

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

Route::get('/dashboard', [CustomerController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.dashboard'); // passes data with value 'admin' to RoleMiddleware
Route::get('/vendor/dashboard', [VendorController::class, 'index'])->middleware(['auth', 'verified', 'role:vendor'])->name('vendor.dashboard'); // passes data with value 'vendor' to RoleMiddleware
