@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')

<div class="container my-5">

    <div class="text-center mb-4">

        <h1 class="fw-bold">
            Katalog Produk
        </h1>

        <p class="text-muted">
            Temukan produk UMKM siswa SMK
        </p>

    </div>


    <!-- SEARCH -->

    <div class="row justify-content-center mb-5">

        <div class="col-md-8">

            <form
                action="{{ route('katalog') }}"
                method="GET"
            >

                <div class="input-group input-group-lg">

                    <input
                        type="text"
                        name="keyword"
                        value="{{ $keyword }}"
                        class="form-control"
                        placeholder="Cari nama atau kategori produk..."
                    >


                    <button
                        class="btn btn-primary"
                        type="submit"
                    >
                        Cari
                    </button>

                </div>

            </form>

        </div>

    </div>


    @if($keyword)

        <div class="alert alert-info">

            Hasil pencarian untuk:

            <strong>
                {{ $keyword }}
            </strong>

        </div>

    @endif


    <!-- PRODUCTS -->

    <div class="row g-4">

        @forelse($produk as $item)

            <div class="col-12 col-sm-6 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <img
                        src="{{ asset('storage/' . $item->gambar) }}"
                        class="card-img-top product-img"
                        alt="{{ $item->nama }}"
                    >


                    <div class="card-body">

                        <span class="badge bg-primary mb-2">

                            {{ $item->kategori }}

                        </span>


                        <h5 class="fw-bold">

                            {{ $item->nama }}

                        </h5>


                        <p class="text-muted small">

                            {{ $item->deskripsi }}

                        </p>


                        <h5 class="text-primary fw-bold">

                            Rp
                            {{ number_format(
                                $item->harga,
                                0,
                                ',',
                                '.'
                            ) }}

                        </h5>


                        <p class="mb-0">

                            <strong>Stok:</strong>

                            @if($item->stok > 0)

                                <span class="text-success">
                                    {{ $item->stok }}
                                </span>

                            @else

                                <span class="text-danger">
                                    Habis
                                </span>

                            @endif

                        </p>

                    </div>


                    <div class="card-footer bg-white border-0 pb-3">

                        <a
                            href="{{ route(
                                'produk.detail',
                                $item->id
                            ) }}"
                            class="btn btn-primary w-100"
                        >
                            Detail Produk
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning text-center">

                    <h5>
                        Produk tidak ditemukan
                    </h5>

                    <p class="mb-0">
                        Coba gunakan nama atau kategori
                        produk yang berbeda.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection