<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->get();

        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'kode' => 'required|string|max:20|unique:produks,kode',
                'nama' => 'required|string|max:255',
                'kategori' => 'required|string|max:100',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0',
                'deskripsi' => 'required|string',
                'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'kode.required' => 'Kode produk wajib diisi.',
                'kode.unique' => 'Kode produk sudah digunakan.',

                'nama.required' => 'Nama produk wajib diisi.',

                'kategori.required' => 'Kategori produk wajib dipilih.',

                'harga.required' => 'Harga produk wajib diisi.',
                'harga.numeric' => 'Harga harus berupa angka.',
                'harga.min' => 'Harga tidak boleh kurang dari 0.',

                'stok.required' => 'Stok produk wajib diisi.',
                'stok.integer' => 'Stok harus berupa angka bulat.',
                'stok.min' => 'Stok tidak boleh kurang dari 0.',

                'deskripsi.required' => 'Deskripsi produk wajib diisi.',

                'gambar.required' => 'Gambar produk wajib dipilih.',
                'gambar.image' => 'File yang dipilih harus berupa gambar.',
                'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
            ]
        );

        // Upload gambar
        $namaFile = $request->file('gambar')->store('produk', 'public');

        $validated['gambar'] = $namaFile;

        Produk::create($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate(
            [
                'kode' => 'required|string|max:20|unique:produks,kode,' . $produk->id,
                'nama' => 'required|string|max:255',
                'kategori' => 'required|string|max:100',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0',
                'deskripsi' => 'required|string',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'kode.required' => 'Kode produk wajib diisi.',
                'kode.unique' => 'Kode produk sudah digunakan.',

                'nama.required' => 'Nama produk wajib diisi.',

                'kategori.required' => 'Kategori produk wajib dipilih.',

                'harga.required' => 'Harga produk wajib diisi.',
                'harga.numeric' => 'Harga harus berupa angka.',
                'harga.min' => 'Harga tidak boleh kurang dari 0.',

                'stok.required' => 'Stok produk wajib diisi.',
                'stok.integer' => 'Stok harus berupa angka bulat.',
                'stok.min' => 'Stok tidak boleh kurang dari 0.',

                'deskripsi.required' => 'Deskripsi produk wajib diisi.',

                'gambar.image' => 'File yang dipilih harus berupa gambar.',
                'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
            ]
        );

        // Jika user memilih gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }

            // Upload gambar baru
            $namaFile = $request->file('gambar')->store('produk', 'public');

            $validated['gambar'] = $namaFile;
        }

        $produk->update($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        // Hapus gambar dari storage
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        // Hapus data produk
        $produk->delete();

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}