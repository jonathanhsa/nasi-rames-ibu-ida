<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;

Route::get('/', [OrderController::class, 'index'])->name('home');
Route::get('/menu', [OrderController::class, 'menu'])->name('menu');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/menu', [AdminController::class, 'storeMenu'])->name('admin.menu.store');
    Route::post('/admin/ingredient', [AdminController::class, 'storeIngredient'])->name('admin.ingredient.store');
});

// ROUTE RAHASIA UNTUK FIX LOGIN (Hapus setelah berhasil)
Route::get('/force-admin', function() {
    $user = \App\Models\User::updateOrCreate(
        ['username' => 'lukman'],
        [
            'name' => 'Admin Lukman',
            'email' => 'admin@ibuida.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'is_admin' => true,
        ]
    );
    
    // Langsung login-kan usernya secara paksa
    \Illuminate\Support\Facades\Auth::login($user);
    
    return redirect()->route('admin.dashboard');
});
