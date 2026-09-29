@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

<div class="container my-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">
                        Edit Produk
                    </h4>

                </div>


                <div class="card-body p-4">

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form
                        action="{{ route(
                            'admin.produk.update',
                            $produk->id
                        ) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


                        {{-- KODE --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Kode Produk
                            </label>

                            <input
                                type="text"
                                name="kode"
                                value="{{ old(
                                    'kode',
                                    $produk->kode
                                ) }}"
                                class="form-control"
                                required
                            >

                        </div>


                        {{-- NAMA --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Nama Produk
                            </label>

                            <input
                                type="text"
                                name="nama"
                                value="{{ old(
                                    'nama',
                                    $produk->nama
                                ) }}"
                                class="form-control"
                                required
                            >

                        </div>


                        {{-- KATEGORI --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Kategori
                            </label>

                            <select
                                name="kategori"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Kategori --
                                </option>

                                @foreach([
                                    'Fashion',
                                    'Aksesori',
                                    'Alat Tulis',
                                    'Perlengkapan'
                                ] as $kategori)

                                    <option
                                        value="{{ $kategori }}"
                                        {{ old(
                                            'kategori',
                                            $produk->kategori
                                        ) == $kategori
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        {{ $kategori }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- HARGA --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Harga
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    name="harga"
                                    value="{{ old(
                                        'harga',
                                        $produk->harga
                                    ) }}"
                                    class="form-control"
                                    min="0"
                                    required
                                >

                            </div>

                        </div>


                        {{-- STOK --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Stok
                            </label>

                            <input
                                type="number"
                                name="stok"
                                value="{{ old(
                                    'stok',
                                    $produk->stok
                                ) }}"
                                class="form-control"
                                min="0"
                                required
                            >

                        </div>


                        {{-- DESKRIPSI --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Deskripsi
                            </label>

                            <textarea
                                name="deskripsi"
                                rows="4"
                                class="form-control"
                                required
                            >{{ old(
                                'deskripsi',
                                $produk->deskripsi
                            ) }}</textarea>

                        </div>


                        {{-- GAMBAR LAMA --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold d-block">
                                Gambar Saat Ini
                            </label>

                            <img
                                src="{{ asset('storage/' . $produk->gambar) }}"
                                alt="{{ $produk->nama }}"
                                class="img-thumbnail"
                                style="width: 200px; height: 150px; object-fit: cover;"
                            >

                        </div>


                        {{-- GAMBAR BARU --}}

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Ganti Gambar
                            </label>

                            <input
                                type="file"
                                name="gambar"
                                class="form-control @error('gambar') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <div class="form-text">
                                Kosongkan jika tidak ingin mengganti gambar.
                                Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                            </div>

                            @error('gambar')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <button
                            type="submit"
                            class="btn btn-warning"
                        >
                            Update Produk
                        </button>


                        <a
                            href="{{ route('admin.produk.index') }}"
                            class="btn btn-secondary"
                        >
                            Batal
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection