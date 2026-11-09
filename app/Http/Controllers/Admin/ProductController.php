<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::with('brand')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('brands', 'categories'));
    }

    // Menyimpan produk ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload Gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Simpan ke database
        Product::create([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'image' => $imagePath,
            'is_active' => true,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
}