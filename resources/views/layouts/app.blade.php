<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Katalog UMKM Siswa SMK')
    </title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f8f9fa;
        }

        .hero {
            min-height: 430px;

            background:
                linear-gradient(
                    rgba(13, 110, 253, 0.85),
                    rgba(13, 110, 253, 0.85)
                ),
                url('https://placehold.co/1600x600?text=Katalog+UMKM+Siswa+SMK')
                center / cover;

            border-radius: 20px;
        }

        .product-img {
            height: 220px;
            object-fit: cover;
        }

        .detail-img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        /* Card dibuat statis tanpa animasi */
        .card {
            border: 1px solid #dee2e6;
        }

        footer {
            margin-top: 80px;
        }

    </style>

    @stack('styles')

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="{{ route('home') }}"
        >
            Katalog UMKM Siswa SMK
        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        <div
            class="collapse navbar-collapse"
            id="navbarMenu"
        >

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('home') }}"
                    >
                        Home
                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('katalog') }}"
                    >
                        Katalog
                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('admin.produk.index') }}"
                    >
                        Admin
                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>


<!-- CONTENT -->

@yield('content')


<!-- FOOTER -->

<footer class="bg-primary text-white text-center py-4">

    <div class="container">

        <p class="mb-1 fw-bold">
            Katalog UMKM Siswa SMK
        </p>

        <small>
            © {{ date('Y') }} Katalog UMKM Siswa SMK
        </small>

    </div>

</footer>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


@stack('scripts')

</body>

</html>