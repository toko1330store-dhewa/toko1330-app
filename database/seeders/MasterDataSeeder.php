<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Brand dulu
        $sitra = Brand::updateOrCreate(['slug' => 'sitra'], ['name' => 'SITRA']);
        $shafahat = Brand::updateOrCreate(['slug' => 'shafahat'], ['name' => 'SHAFAHAT']);
        $kei = Brand::updateOrCreate(['slug' => 'kei'], ['name' => 'KEI']);

        // 2. Buat Kategori dengan menyertakan brand_id
        // (Kita asumsikan kategori buku milik SHAFAHAT, dan aksesoris milik SITRA/KEI)
        Category::updateOrCreate(
            ['slug' => 'buku'], 
            ['name' => 'Buku', 'brand_id' => $shafahat->id]
        );
        
        Category::updateOrCreate(
            ['slug' => 'aksesoris'], 
            ['name' => 'Aksesoris', 'brand_id' => $sitra->id]
        );
    }
}