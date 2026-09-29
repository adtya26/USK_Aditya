@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="container my-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        Tambah Produk
                    </h4>
                </div>

                <div class="card-body p-4">

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <h6 class="fw-bold">
                                Terdapat kesalahan:
                            </h6>

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
                        action="{{ route('admin.produk.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf


                        {{-- KODE --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Kode Produk
                            </label>

                            <input
                                type="text"
                                name="kode"
                                value="{{ old('kode') }}"
                                class="form-control @error('kode') is-invalid @enderror"
                                placeholder="Contoh: P009"
                                required
                            >

                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- NAMA --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Nama Produk
                            </label>

                            <input
                                type="text"
                                name="nama"
                                value="{{ old('nama') }}"
                                class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Masukkan nama produk"
                                required
                            >

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- KATEGORI --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Kategori
                            </label>

                            <select
                                name="kategori"
                                class="form-select @error('kategori') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    -- Pilih Kategori --
                                </option>

                                <option
                                    value="Fashion"
                                    {{ old('kategori') == 'Fashion' ? 'selected' : '' }}
                                >
                                    Fashion
                                </option>

                                <option
                                    value="Aksesori"
                                    {{ old('kategori') == 'Aksesori' ? 'selected' : '' }}
                                >
                                    Aksesori
                                </option>

                                <option
                                    value="Alat Tulis"
                                    {{ old('kategori') == 'Alat Tulis' ? 'selected' : '' }}
                                >
                                    Alat Tulis
                                </option>

                                <option
                                    value="Perlengkapan"
                                    {{ old('kategori') == 'Perlengkapan' ? 'selected' : '' }}
                                >
                                    Perlengkapan
                                </option>

                            </select>

                            @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

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
                                    value="{{ old('harga') }}"
                                    class="form-control @error('harga') is-invalid @enderror"
                                    placeholder="75000"
                                    min="0"
                                    required
                                >

                            </div>

                            @error('harga')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- STOK --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Stok
                            </label>

                            <input
                                type="number"
                                name="stok"
                                value="{{ old('stok') }}"
                                class="form-control @error('stok') is-invalid @enderror"
                                placeholder="20"
                                min="0"
                                required
                            >

                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- DESKRIPSI --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Deskripsi
                            </label>

                            <textarea
                                name="deskripsi"
                                rows="4"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan deskripsi produk..."
                                required
                            >{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- GAMBAR --}}

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Gambar Produk
                            </label>

                            <input
                                type="file"
                                name="gambar"
                                class="form-control @error('gambar') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp"
                                required
                            >

                            <div class="form-text">
                                Format: JPG, JPEG, PNG, WEBP.
                                Maksimal 2 MB.
                            </div>

                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- BUTTON --}}

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Simpan Produk
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