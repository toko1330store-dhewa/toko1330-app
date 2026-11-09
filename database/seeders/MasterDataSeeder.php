<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat/Update Brand
        $sitra = Brand::updateOrCreate(['slug' => 'sitra'], ['name' => 'SITRA']);
        $shafahat = Brand::updateOrCreate(['slug' => 'shafahat'], ['name' => 'SHAFAHAT']);
        $kei = Brand::updateOrCreate(['slug' => 'kei'], ['name' => 'KEI']);

        // 2. Buat Kategori sesuai Brand-nya
        // SITRA
        Category::updateOrCreate(['slug' => 'sitra-jubah'], ['name' => 'Jubah Muslimah', 'brand_id' => $sitra->id]);
        Category::updateOrCreate(['slug' => 'sitra-cadar'], ['name' => 'Cadar', 'brand_id' => $sitra->id]);
        Category::updateOrCreate(['slug' => 'sitra-aksesoris'], ['name' => 'Aksesoris Muslimah', 'brand_id' => $sitra->id]);

        // SHAFAHAT
        Category::updateOrCreate(['slug' => 'shafahat-buku'], ['name' => 'Buku Tulis', 'brand_id' => $shafahat->id]);
        Category::updateOrCreate(['slug' => 'shafahat-atk'], ['name' => 'ATK', 'brand_id' => $shafahat->id]);

        // KEI
        Category::updateOrCreate(['slug' => 'kei-giftbox'], ['name' => 'Gift Box', 'brand_id' => $kei->id]);
        Category::updateOrCreate(['slug' => 'kei-aksesoris'], ['name' => 'Aksesoris Menarik', 'brand_id' => $kei->id]);
        Category::updateOrCreate(['slug' => 'kei-makanan'], ['name' => 'Makanan dan Minuman Home Made', 'brand_id' => $kei->id]);
    }
}