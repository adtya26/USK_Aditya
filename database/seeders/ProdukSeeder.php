<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'kode' => 'P001',
            'nama' => 'Kaos SMK Kreatif',
            'kategori' => 'Fashion',
            'harga' => 75000,
            'stok' => 20,
            'deskripsi' => 'Kaos desain siswa SMK yang cocok digunakan untuk kegiatan sekolah maupun sehari-hari.',
            'gambar' => 'https://placehold.co/800x600?text=Kaos+SMK+Kreatif',
        ]);

        Produk::create([
            'kode' => 'P002',
            'nama' => 'Totebag Edukasi',
            'kategori' => 'Aksesori',
            'harga' => 45000,
            'stok' => 20,
            'deskripsi' => 'Totebag untuk kegiatan sekolah yang praktis dan dapat digunakan sehari-hari.',
            'gambar' => 'https://placehold.co/800x600?text=Totebag+Edukasi',
        ]);

        Produk::create([
            'kode' => 'P003',
            'nama' => 'Notebook Pelajar',
            'kategori' => 'Alat Tulis',
            'harga' => 25000,
            'stok' => 15,
            'deskripsi' => 'Notebook untuk mencatat materi pelajaran, tugas, dan berbagai kegiatan belajar.',
            'gambar' => 'https://placehold.co/800x600?text=Notebook+Pelajar',
        ]);

        Produk::create([
            'kode' => 'P004',
            'nama' => 'Tumbler Sekolah',
            'kategori' => 'Aksesori',
            'harga' => 65000,
            'stok' => 30,
            'deskripsi' => 'Botol minum reusable yang cocok dibawa ke sekolah dan membantu mengurangi penggunaan botol sekali pakai.',
            'gambar' => 'https://placehold.co/800x600?text=Tumbler+Sekolah',
        ]);

        Produk::create([
            'kode' => 'P005',
            'nama' => 'Stiker Kreatif',
            'kategori' => 'Aksesori',
            'harga' => 15000,
            'stok' => 18,
            'deskripsi' => 'Paket stiker bertema edukasi dengan desain kreatif hasil karya siswa.',
            'gambar' => 'https://placehold.co/800x600?text=Stiker+Kreatif',
        ]);

        Produk::create([
            'kode' => 'P006',
            'nama' => 'Pin Ekskul',
            'kategori' => 'Aksesori',
            'harga' => 10000,
            'stok' => 50,
            'deskripsi' => 'Pin kegiatan ekstrakurikuler yang cocok digunakan sebagai identitas kegiatan siswa.',
            'gambar' => 'https://placehold.co/800x600?text=Pin+Ekskul',
        ]);

        Produk::create([
            'kode' => 'P007',
            'nama' => 'Topi Sekolah',
            'kategori' => 'Fashion',
            'harga' => 55000,
            'stok' => 12,
            'deskripsi' => 'Topi model kasual yang cocok digunakan untuk kegiatan sekolah dan aktivitas sehari-hari.',
            'gambar' => 'https://placehold.co/800x600?text=Topi+Sekolah',
        ]);

        Produk::create([
            'kode' => 'P008',
            'nama' => 'Mug Kelas',
            'kategori' => 'Perlengkapan',
            'harga' => 35000,
            'stok' => 25,
            'deskripsi' => 'Mug souvenir kelas yang cocok digunakan sebagai kenang-kenangan kegiatan kelas.',
            'gambar' => 'https://placehold.co/800x600?text=Mug+Kelas',
        ]);
    }
}