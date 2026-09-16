<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BookStore - Toko Buku Online</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .hero {
            background: #212529;
            color: white;
            border-radius: 20px;
            padding: 60px 40px;
            margin-bottom: 40px;
        }

        .book-card {
            transition: 0.2s;
            height: 100%;
        }

        .book-card:hover {
            transform: translateY(-4px);
        }

        .book-cover {
            height: 280px;
            object-fit: cover;
            background-color: #e9ecef;
        }

        .price {
            font-weight: 700;
            color: #198754;
        }
    </style>
</head>

<body>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            📚 BookStore
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">
                        About Us
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">
                            🛒 Keranjang
                        </a>
                    </li>

                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-primary"
                               href="{{ route('admin.dashboard') }}">
                                Dashboard Admin
                            </a>
                        </li>
                    @endif

                    <li class="nav-item ms-lg-2">
                        <span class="nav-link">
                            Halo, {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-outline-danger btn-sm"
                            >
                                Logout
                            </button>
                        </form>
                    </li>

                @else

                    <li class="nav-item ms-lg-2">
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-outline-dark btn-sm me-2"
                        >
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('register') }}"
                            class="btn btn-dark btn-sm"
                        >
                            Register
                        </a>
                    </li>

                @endauth

            </ul>

        </div>
    </div>
</nav>


<div class="container py-5">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    {{-- Hero --}}
    <div class="hero">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <h1 class="display-5 fw-bold">
                    Temukan Buku Favoritmu
                </h1>

                <p class="lead mt-3">
                    Jelajahi berbagai koleksi buku dan temukan
                    bacaan yang sesuai dengan minatmu.
                </p>

            </div>

            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">

                <div class="display-1">
                    📚
                </div>

            </div>

        </div>

    </div>


    {{-- Search & Filter --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form action="{{ route('home') }}" method="GET">

                <div class="row g-3">

                    <div class="col-md-7">

                        <label class="form-label fw-semibold">
                            Cari Buku
                        </label>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari berdasarkan judul atau penulis..."
                            value="{{ request('search') }}"
                        >

                    </div>

                    <div class="col-md-3">

                        <label class="form-label fw-semibold">
                            Kategori
                        </label>

                        <select name="category" class="form-select">

                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-dark w-100"
                        >
                            🔎 Cari
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Book List --}}
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h3 class="fw-bold mb-1">
                Koleksi Buku
            </h3>

            <p class="text-muted mb-0">
                {{ $books->count() }} buku tersedia
            </p>
        </div>

    </div>


    <div class="row g-4">

        @forelse($books as $book)

            <div class="col-md-6 col-lg-3">

                <div class="card book-card border-0 shadow-sm">

                    @if($book->cover)

                        <img
                            src="{{ asset('storage/' . $book->cover) }}"
                            class="card-img-top book-cover"
                            alt="{{ $book->title }}"
                        >

                    @else

                        <div
                            class="book-cover d-flex align-items-center justify-content-center"
                        >
                            <span class="display-4">
                                📖
                            </span>
                        </div>

                    @endif


                    <div class="card-body d-flex flex-column">

                        <span class="badge bg-secondary align-self-start mb-2">
                            {{ $book->category->name ?? 'Tanpa Kategori' }}
                        </span>

                        <h5 class="card-title fw-bold">
                            {{ $book->title }}
                        </h5>

                        <p class="text-muted mb-2">
                            {{ $book->author }}
                        </p>

                        <p class="price mb-3">
                            Rp {{ number_format($book->price, 0, ',', '.') }}
                        </p>

                        <p class="small text-muted">
                            Stok: {{ $book->stock }}
                        </p>


                        <div class="mt-auto">

                            <a
                                href="{{ route('book.detail', $book) }}"
                                class="btn btn-outline-dark btn-sm w-100 mb-2"
                            >
                                Lihat Detail
                            </a>

                            @auth

                                @if($book->stock > 0)

                                    <form
                                        action="{{ route('cart.add', $book) }}"
                                        method="POST"
                                    >
                                        @csrf

                                        <input
                                            type="hidden"
                                            name="quantity"
                                            value="1"
                                        >

                                        <button
                                            type="submit"
                                            class="btn btn-dark btn-sm w-100"
                                        >
                                            🛒 Tambah ke Keranjang
                                        </button>

                                    </form>

                                @else

                                    <button
                                        class="btn btn-secondary btn-sm w-100"
                                        disabled
                                    >
                                        Stok Habis
                                    </button>

                                @endif

                            @else

                                <a
                                    href="{{ route('login') }}"
                                    class="btn btn-dark btn-sm w-100"
                                >
                                    Login untuk Membeli
                                </a>

                            @endauth

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <div class="display-3 mb-3">
                            📚
                        </div>

                        <h4 class="fw-bold">
                            Belum Ada Buku
                        </h4>

                        <p class="text-muted">
                            Belum ada buku yang tersedia.
                        </p>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>