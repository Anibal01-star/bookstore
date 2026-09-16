<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $book->title }} - BookStore</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">

        <a class="navbar-brand fw-bold"
           href="{{ route('home') }}">
            📚 BookStore
        </a>

        <div class="ms-auto">

            @auth

                <a href="{{ route('cart') }}"
                   class="btn btn-outline-dark btn-sm me-2">
                    🛒 Keranjang
                </a>

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="d-inline">
                    @csrf

                    <button
                        type="submit"
                        class="btn btn-outline-danger btn-sm">
                        Logout
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}"
                   class="btn btn-outline-dark btn-sm me-2">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="btn btn-dark btn-sm">
                    Register
                </a>

            @endauth

        </div>

    </div>
</nav>


<div class="container py-5">

    {{-- Back --}}
    <a href="{{ route('home') }}"
       class="text-decoration-none text-dark">
        ← Kembali ke Koleksi Buku
    </a>


    <div class="card border-0 shadow-sm mt-4">

        <div class="card-body p-4 p-lg-5">

            <div class="row g-5 align-items-center">

                {{-- Cover --}}
                <div class="col-md-5 text-center">

                    @if($book->cover)

                        <img
                            src="{{ asset('storage/' . $book->cover) }}"
                            alt="{{ $book->title }}"
                            class="img-fluid rounded shadow-sm"
                            style="max-height: 500px; object-fit: cover;"
                        >

                    @else

                        <div
                            class="bg-light rounded d-flex align-items-center justify-content-center"
                            style="height: 450px;"
                        >
                            <span style="font-size: 100px;">
                                📖
                            </span>
                        </div>

                    @endif

                </div>


                {{-- Information --}}
                <div class="col-md-7">

                    <span class="badge bg-secondary mb-3">
                        {{ $book->category->name ?? 'Tanpa Kategori' }}
                    </span>

                    <h1 class="fw-bold mb-3">
                        {{ $book->title }}
                    </h1>

                    <p class="text-muted fs-5 mb-4">
                        Oleh {{ $book->author }}
                    </p>


                    <h3 class="fw-bold text-success mb-3">
                        Rp {{ number_format($book->price, 0, ',', '.') }}
                    </h3>


                    <div class="mb-4">

                        <h5 class="fw-bold">
                            Deskripsi
                        </h5>

                        <p class="text-muted">
                            {{ $book->description ?: 'Belum ada deskripsi untuk buku ini.' }}
                        </p>

                    </div>


                    <div class="mb-4">

                        <strong>
                            Stok:
                        </strong>

                        @if($book->stock > 0)

                            <span class="text-success">
                                {{ $book->stock }} tersedia
                            </span>

                        @else

                            <span class="text-danger">
                                Stok habis
                            </span>

                        @endif

                    </div>


                    {{-- Cart --}}
                    @auth

                        @if($book->stock > 0)

                            <form
                                action="{{ route('cart.add', $book) }}"
                                method="POST"
                            >

                                @csrf

                                <div class="row g-2">

                                    <div class="col-auto">

                                        <input
                                            type="number"
                                            name="quantity"
                                            class="form-control"
                                            value="1"
                                            min="1"
                                            max="{{ $book->stock }}"
                                            style="width: 100px;"
                                        >

                                    </div>

                                    <div class="col">

                                        <button
                                            type="submit"
                                            class="btn btn-dark w-100"
                                        >
                                            🛒 Tambah ke Keranjang
                                        </button>

                                    </div>

                                </div>

                            </form>

                        @else

                            <button
                                class="btn btn-secondary w-100"
                                disabled
                            >
                                Stok Habis
                            </button>

                        @endif

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="btn btn-dark w-100"
                        >
                            Login untuk Membeli
                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>