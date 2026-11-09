<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relasi ke tabel Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relasi ke tabel Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}