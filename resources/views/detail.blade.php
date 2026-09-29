@extends('layouts.app')

@section('title', $produk->nama)

@section('content')

<div class="container my-5">

    <div class="row g-5 align-items-center">


        <!-- GAMBAR -->

        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <img
                    src="{{ asset('storage/' . $produk->gambar) }}"
                    class="card-img-top detail-img rounded"
                    alt="{{ $produk->nama }}"
                >

            </div>

        </div>


        <!-- INFORMASI -->

        <div class="col-md-6">

            <span class="badge bg-primary mb-3">

                {{ $produk->kategori }}

            </span>


            <h1 class="display-5 fw-bold">

                {{ $produk->nama }}

            </h1>


            <p class="text-muted">

                Kode Produk:

                <strong>
                    {{ $produk->kode }}
                </strong>

            </p>


            <h2 class="text-primary fw-bold my-4">

                Rp
                {{ number_format(
                    $produk->harga,
                    0,
                    ',',
                    '.'
                ) }}

            </h2>


            <div class="card bg-light border-0 mb-4">

                <div class="card-body">

                    <h6 class="fw-bold">
                        Ketersediaan
                    </h6>


                    @if($produk->stok > 0)

                        <span class="badge bg-success">
                            Tersedia
                        </span>

                        <span class="ms-2">
                            {{ $produk->stok }} stok
                        </span>

                    @else

                        <span class="badge bg-danger">
                            Stok Habis
                        </span>

                    @endif

                </div>

            </div>


            <h5 class="fw-bold">
                Deskripsi Produk
            </h5>


            <p class="text-muted">

                {{ $produk->deskripsi }}

            </p>


            <div class="mt-4">

                <a
                    href="{{ route('katalog') }}"
                    class="btn btn-secondary"
                >
                    Kembali ke Katalog
                </a>

            </div>

        </div>

    </div>

</div>

@endsection