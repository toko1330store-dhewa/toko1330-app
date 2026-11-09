<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            // Kategori SHAFAHAT (brand_id: 1)
            ['brand_id' => 1, 'name' => 'Buku Tulis', 'slug' => 'buku-tulis', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 1, 'name' => 'Alat Tulis (ATK)', 'slug' => 'alat-tulis', 'created_at' => now(), 'updated_at' => now()],
            
            // Kategori KEI (brand_id: 2)
            ['brand_id' => 2, 'name' => 'Hampers & Gift', 'slug' => 'hampers-gift', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 2, 'name' => 'Makanan & Minuman', 'slug' => 'makanan-minuman', 'created_at' => now(), 'updated_at' => now()],
            
            // Kategori SITRA (brand_id: 3)
            ['brand_id' => 3, 'name' => 'Hijab', 'slug' => 'hijab', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 3, 'name' => 'Gamis & Tunik', 'slug' => 'gamis-tunik', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}