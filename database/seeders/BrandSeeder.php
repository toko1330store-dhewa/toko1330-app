<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahan untuk mengakses database

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'name' => 'SHAFAHAT',
                'slug' => 'shafahat',
                'description' => 'Produk buku tulis dan alat tulis kantor (ATK) berkualitas.',
                'color_theme' => '#3B82F6', // Biru (Contoh)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KEI',
                'slug' => 'kei',
                'description' => 'Produk gift, hampers, makanan dan minuman kemasan home made.',
                'color_theme' => '#F59E0B', // Oranye (Contoh)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SITRA',
                'slug' => 'sitra',
                'description' => 'Produk fashion muslimah syar\'i yang elegan dan nyaman.',
                'color_theme' => '#10B981', // Hijau (Contoh)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}