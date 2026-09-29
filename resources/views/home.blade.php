@extends('layouts.app')

@section('title', 'Home - Katalog UMKM Siswa SMK')

@section('content')

<div class="container my-4">


    <!-- HERO -->

    <section class="hero d-flex align-items-center text-white p-4 p-md-5">

        <div class="col-md-8">

            <span class="badge bg-light text-primary mb-3">
                UMKM Siswa SMK
            </span>


            <h1 class="display-4 fw-bold">
                Katalog UMKM Siswa SMK
            </h1>


            <p class="lead">
                Temukan berbagai produk kreatif hasil karya
                siswa SMK untuk kebutuhan sekolah dan
                kehidupan sehari-hari.
            </p>


            <a
                href="{{ route('katalog') }}"
                class="btn btn-light btn-lg fw-bold"
            >
                Lihat Katalog
            </a>

        </div>

    </section>


    <!-- PRODUK TERBARU -->

    <section class="my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    Produk Terbaru
                </h2>

                <p class="text-muted mb-0">
                    Produk pilihan dari siswa SMK
                </p>

            </div>


            <a
                href="{{ route('katalog') }}"
                class="btn btn-outline-primary"
            >
                Lihat Semua
            </a>

        </div>


        <div class="row g-4">

            @foreach($produk as $item)

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


                            <h5 class="card-title fw-bold">
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

                        </div>


                        <div class="card-footer bg-white border-0 pb-3">

                            <a
                                href="{{ route(
                                    'produk.detail',
                                    $item->id
                                ) }}"
                                class="btn btn-primary w-100"
                            >
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

</div>

@endsection