# Progress Project: Toko 1330 (E-Commerce Mobile-First)

## 📌 Informasi Project
- **Framework:** Laravel 12 (PHP 8.2)
- **Database:** MySQL (`db_toko1330`) di XAMPP
- **Tema UI:** Mobile-first, mengunakan Tailwind CSS (via CDN).
- **Warna Tema:** Hijau Botol Gelap (`#082621`), Kartu Emas (`#e6cca1`), Aksen Gold (`#d4af37`).
- **Status Auth:** Belum ada sistem login (menggunakan **Guest Checkout**).

## ✅ Fitur yang Sudah Selesai (Done)
1. **Home:** Tampilan premium (tema gelap/emas), logo brand, card brand yang bisa diklik & informatif, produk terbaru.
2. **Kategori:** Filter berdasarkan Kategori dan Brand. URL rapi (menggunakan `/{slug?}`).
3. **Detail Produk:** Tampilan produk dan tombol "Tambah ke Keranjang".
4. **Keranjang (Cart):** Berbasis Session. Tambah, hapus, dan hitung subtotal.
5. **Checkout (Guest):** 
   - Form alamat & pilihan kota.
   - Hitung ongkir otomatis.
   - Nomor Invoice otomatis (Format: `INV-GUEST-YYYYMMDD-0001`).
   - Stok produk otomatis berkurang setelah checkout.
6. **Halaman Sukses:** Menampilkan Invoice & Total, serta tombol Lacak Pesanan.
7. **Lacak Pesanan (Guest):** Pembeli bisa input nomor invoice untuk melihat status.
8. **Admin Panel:**
   - `/admin/products`: Tambah produk & upload gambar.
   - `/admin/orders`: Daftar pesanan & detail pesanan.
   - `/admin/orders/{id}`: Ubah status pesanan (Pending -> Diproses -> Selesai).

## 📂 Struktur File Penting
- `routes/web.php`: Semua rute aplikasi.
- `app/Http/Controllers/`:
  - `HomeController.php` (Home, Detail, Kategori)
  - `CartController.php` (Keranjang)
  - `CheckoutController.php` (Checkout, Lacak, Invoice)
  - `Admin/ProductController.php`
  - `Admin/OrderController.php`
- `resources/views/`:
  - `home.blade.php`, `category.blade.php`, `product-detail.blade.php`
  - `cart.blade.php`, `checkout.blade.php`, `checkout-success.blade.php`
  - `track-order.blade.php`, `track-result.blade.php`, `account.blade.php`
  - `partials/bottom-nav.blade.php` (Navigasi bawah yang dipanggil di semua halaman)
  - `admin/products/`, `admin/orders/`

## 🚀 Rencana Selanjutnya (To-Do List)
1. **Sistem Login/Member:** Instal Laravel Breeze. Nanti invoice otomatis berubah jadi nama member (contoh: `INV-BUDI-20261108-0001`).
2. **Fitur Pencarian:** Mengaktifkan kolom Search di Home dan Kategori.
3. **Halaman Detail Akun:** Mengganti placeholder tombol "Masuk / Daftar Akun" dengan form asli.
4. **Tambahan Gambar Hiasan:** Menambahkan background image atau ornamen emas di halaman depan.

## ⚠️ Catatan Penting untuk AI di Room Baru
- **Jangan gunakan `<x-app-layout>`**. Project ini menggunakan HTML murni di setiap file `.blade.php` dengan Tailwind CDN.
- Semua file view memanggil `@include('partials.bottom-nav')` untuk navigasi bawah.
- Jangan lupa jalankan `php artisan serve` dan pastikan Apache & MySQL XAMPP menyala.