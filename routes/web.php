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
    $output = [];

    // 1. Jalankan migrasi database (buat semua tabel)
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $output[] = "✅ Migrasi berhasil!";
    } catch (\Exception $e) {
        $output[] = "⚠️ Migrasi: " . $e->getMessage();
    }

    // 2. Buat/update user admin
    try {
        $user = \App\Models\User::updateOrCreate(
            ['username' => 'lukman'],
            [
                'name'     => 'Admin Lukman',
                'email'    => 'admin@ibuida.com',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
                'is_admin' => true,
            ]
        );
        $output[] = "✅ User admin 'lukman' berhasil dibuat/diperbarui!";
    } catch (\Exception $e) {
        $output[] = "❌ User: " . $e->getMessage();
        return implode("<br>", $output);
    }

    // 3. Jalankan seeder menu (opsional, skip jika sudah ada)
    try {
        if (\App\Models\Menu::count() == 0) {
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'MenuSeeder', '--force' => true]);
            $output[] = "✅ Data menu berhasil di-seed!";
        } else {
            $output[] = "ℹ️ Data menu sudah ada, seed dilewati.";
        }
    } catch (\Exception $e) {
        $output[] = "⚠️ Seed menu: " . $e->getMessage();
    }

    // 4. Login langsung sebagai admin
    \Illuminate\Support\Facades\Auth::login($user);

    $output[] = "<br><strong>🎉 Selesai! Anda akan dialihkan ke dashboard...</strong>";
    $output[] = "<meta http-equiv='refresh' content='2;url=/admin'>";

    return implode("<br>", $output);
});
