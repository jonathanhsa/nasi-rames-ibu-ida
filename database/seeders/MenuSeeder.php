<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Menu::insert([
            ['name' => 'Nasi Rames Ayam Bakar', 'description' => 'Nasi putih, ayam bakar manis, sayur nangka, sambal ijo.', 'price' => 20000, 'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?auto=format&fit=crop&w=400&q=80', 'category' => 'makanan'],
            ['name' => 'Nasi Rames Rendang', 'description' => 'Nasi putih, rendang daging sapi empuk, daun singkong, sambal merah.', 'price' => 25000, 'image' => 'https://images.unsplash.com/photo-1604014237800-1c9102c219da?auto=format&fit=crop&w=400&q=80', 'category' => 'makanan'],
            ['name' => 'Nasi Rames Telur Balado', 'description' => 'Nasi putih, telur balado pedas manis, tahu tempe goreng, lalapan.', 'price' => 15000, 'image' => 'https://images.unsplash.com/photo-1548943487-a2e4b43b584f?auto=format&fit=crop&w=400&q=80', 'category' => 'makanan'],
            ['name' => 'Nasi Rames Ikan Bakar', 'description' => 'Nasi putih, ikan nila bakar kecap, sayur asem, sambal dabu-dabu.', 'price' => 22000, 'image' => 'https://images.unsplash.com/photo-1626082896492-766af4eb65ed?auto=format&fit=crop&w=400&q=80', 'category' => 'makanan'],
            ['name' => 'Es Teh Manis', 'description' => 'Teh manis segar dengan es batu pilihan, cocok menemani makan siang.', 'price' => 5000, 'image' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?auto=format&fit=crop&w=400&q=80', 'category' => 'minuman'],
            ['name' => 'Es Jeruk Peras', 'description' => 'Jeruk segar diperas langsung, manis asam menyegarkan.', 'price' => 8000, 'image' => 'https://images.unsplash.com/photo-1621506289937-a8e4df240d0b?auto=format&fit=crop&w=400&q=80', 'category' => 'minuman'],
            ['name' => 'Es Dawet', 'description' => 'Minuman tradisional dengan cendol, santan segar, dan gula merah.', 'price' => 10000, 'image' => 'https://images.unsplash.com/photo-1541532713592-79a0317b6b77?auto=format&fit=crop&w=400&q=80', 'category' => 'minuman'],
        ]);
    }
}
