<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category; // Pastikan ini ada

class HomeController extends Controller
{
    // 1. Fungsi untuk Halaman Utama
    public function index()
    {
        $brands = Brand::all(); 
        $products = Product::with('brand')->latest()->take(4)->get();

        return view('home', compact('brands', 'products'));
    }

    // 2. Fungsi untuk Halaman Detail Produk
    public function show($slug)
    {
        $product = Product::with(['brand', 'category'])->where('slug', $slug)->firstOrFail();

        return view('product-detail', compact('product'));
    }

    // 3. Fungsi Halaman Kategori (Bisa Filter Kategori atau Brand)
    public function category($slug = null)
    {
        $categories = Category::all();
        
        if ($slug) {
            // Cek apakah slug ini adalah nama kategori
            $selectedCategory = Category::where('slug', $slug)->first();
            
            if ($selectedCategory) {
                // Jika yang diklik adalah Kategori (misal: Buku, Aksesoris)
                $products = Product::with('brand')->where('category_id', $selectedCategory->id)->latest()->get();
            } else {
                // Jika yang diklik adalah Brand (misal: sitra, shafahat, kei)
                $selectedBrand = Brand::where('slug', $slug)->firstOrFail();
                $products = Product::with('brand')->where('brand_id', $selectedBrand->id)->latest()->get();
                $selectedCategory = null; // Set null agar tab kategori tidak error
            }
        } else {
            // Tampilkan semua produk jika tidak ada slug
            $products = Product::with('brand')->latest()->get();
            $selectedCategory = null;
        }

        return view('category', compact('categories', 'products', 'selectedCategory'));
    }
}