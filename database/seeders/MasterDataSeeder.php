<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Brand
        Brand::updateOrCreate(['slug' => 'sitra'], ['name' => 'SITRA']);
        Brand::updateOrCreate(['slug' => 'shafahat'], ['name' => 'SHAFAHAT']);
        Brand::updateOrCreate(['slug' => 'kei'], ['name' => 'KEI']);

        // Buat Kategori
        Category::updateOrCreate(['slug' => 'buku'], ['name' => 'Buku']);
        Category::updateOrCreate(['slug' => 'aksesoris'], ['name' => 'Aksesoris']);
    }
}