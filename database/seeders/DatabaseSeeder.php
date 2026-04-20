<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Membuat Admin Lukman
        User::updateOrCreate(
            ['username' => 'lukman'],
            [
                'name' => 'Admin Lukman',
                'email' => 'admin@ibuida.com',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
                'is_admin' => true,
            ]
        );

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
