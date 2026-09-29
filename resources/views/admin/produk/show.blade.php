@extends('layouts.app')

@section('title', 'Detail Produk Admin')

@section('content')

<div class="container my-5">


    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="fw-bold">
                Detail Produk
            </h1>

            <p class="text-muted mb-0">
                Informasi lengkap produk.
            </p>

        </div>


        <a
            href="{{ route('admin.produk.index') }}"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="row g-0">


            <!-- GAMBAR -->

            <div class="col-md-5">

                <img
                    src="{{ asset('storage/' . $produk->gambar) }}"
                    class="img-fluid rounded-start w-100 h-100"
                    style="object-fit: cover; min-height: 400px;"
                    alt="{{ $produk->nama }}"
                >

            </div>


            <!-- INFORMASI -->

            <div class="col-md-7">

                <div class="card-body p-4">


                    <span class="badge bg-primary mb-3">

                        {{ $produk->kategori }}

                    </span>


                    <h2 class="fw-bold">

                        {{ $produk->nama }}

                    </h2>


                    <p class="text-muted">

                        Kode:

                        <strong>
                            {{ $produk->kode }}
                        </strong>

                    </p>


                    <hr>


                    <div class="row mb-3">

                        <div class="col-sm-4 fw-bold">
                            Harga
                        </div>


                        <div class="col-sm-8 text-primary fw-bold">

                            Rp
                            {{ number_format(
                                $produk->harga,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-sm-4 fw-bold">
                            Stok
                        </div>


                        <div class="col-sm-8">

                            @if($produk->stok > 0)

                                <span class="badge bg-success">
                                    {{ $produk->stok }}
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Habis
                                </span>

                            @endif

                        </div>

                    </div>


                    <div class="mb-4">

                        <h6 class="fw-bold">
                            Deskripsi
                        </h6>


                        <p class="text-muted">
                            {{ $produk->deskripsi }}
                        </p>

                    </div>


                    <div class="d-flex gap-2">

                        <a
                            href="{{ route(
                                'admin.produk.edit',
                                $produk->id
                            ) }}"
                            class="btn btn-warning"
                        >
                            Edit Produk
                        </a>


                        <form
                            action="{{ route(
                                'admin.produk.destroy',
                                $produk->id
                            ) }}"
                            method="POST"
                        >

                            @csrf

                            @method('DELETE')


                            <button
                                type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection