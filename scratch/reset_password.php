<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$user = User::where('username', 'lukman')->first();
if ($user) {
    $user->password = Hash::make('admin123');
    $user->save();
    echo "Password untuk user 'lukman' berhasil direset menjadi 'admin123'\n";
} else {
    echo "User 'lukman' tidak ditemukan di database.\n";
}
