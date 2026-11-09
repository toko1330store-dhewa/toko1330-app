<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Terhubung ke tabel orders
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Terhubung ke tabel products
            $table->string('product_name'); // Simpan nama saat dibeli (jaga-jaga jika nama produk diubah admin)
            $table->integer('price'); // Harga saat dibeli
            $table->integer('quantity'); // Jumlah yang dibeli
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
