@extends('layouts.app')

@section('title', 'Admin - Data Produk')

@section('content')

<div class="container my-5">


    <!-- HEADER -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                Admin Produk
            </h1>

            <p class="text-muted mb-0">
                Kelola data produk UMKM siswa SMK.
            </p>

        </div>


        <a
            href="{{ route('admin.produk.create') }}"
            class="btn btn-primary"
        >
            + Tambah Produk
        </a>

    </div>


    <!-- SUCCESS -->

    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >

            <strong>Berhasil!</strong>

            {{ session('success') }}


            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    <!-- TABLE -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kode</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($produk as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                <td>

                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        width="70"
                                        height="50"
                                        class="rounded"
                                        style="object-fit: cover;"
                                        alt="{{ $item->nama }}"
                                    >

                                </td>


                                <td>

                                    <span class="badge bg-secondary">

                                        {{ $item->kode }}

                                    </span>

                                </td>


                                <td class="fw-bold">

                                    {{ $item->nama }}

                                </td>


                                <td>
                                    {{ $item->kategori }}
                                </td>


                                <td class="text-primary fw-bold">

                                    Rp
                                    {{ number_format(
                                        $item->harga,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </td>


                                <td>

                                    @if($item->stok > 0)

                                        <span class="badge bg-success">

                                            {{ $item->stok }}

                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Habis
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <div class="d-flex gap-1 flex-wrap">

                                        <a
                                            href="{{ route(
                                                'admin.produk.show',
                                                $item->id
                                            ) }}"
                                            class="btn btn-sm btn-info text-white"
                                        >
                                            Detail
                                        </a>


                                        <a
                                            href="{{ route(
                                                'admin.produk.edit',
                                                $item->id
                                            ) }}"
                                            class="btn btn-sm btn-warning"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="{{ route(
                                                'admin.produk.destroy',
                                                $item->id
                                            ) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5"
                                >

                                    <h5>
                                        Belum ada produk
                                    </h5>


                                    <a
                                        href="{{ route(
                                            'admin.produk.create'
                                        ) }}"
                                        class="btn btn-primary"
                                    >
                                        Tambah Produk
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection