<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->take(4)->get();

        return view('home', compact('produk'));
    }

    public function katalog(Request $request)
    {
        $keyword = $request->input('keyword');

        $produk = Produk::query();

        if ($keyword) {
            $produk->where(function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%')
                      ->orWhere('kategori', 'like', '%' . $keyword . '%');
            });
        }

        $produk = $produk->latest()->get();

        return view('katalog', compact('produk', 'keyword'));
    }

    public function detail($id)
    {
        $produk = Produk::findOrFail($id);

        return view('detail', compact('produk'));
    }
}