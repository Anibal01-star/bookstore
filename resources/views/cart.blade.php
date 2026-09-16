<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Keranjang - BookStore</title>

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

        <div class="ms-auto d-flex align-items-center gap-2">

            <a href="{{ route('home') }}"
               class="btn btn-outline-dark btn-sm">
                ← Kembali Belanja
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

        </div>

    </div>
</nav>


<div class="container py-5">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">
            Keranjang Belanja
        </h2>

        <p class="text-muted mb-0">
            Periksa kembali buku yang ingin kamu pesan.
        </p>
    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    @if($cart->items->count() > 0)

        @php
            $total = 0;
        @endphp

        <div class="row g-4">

            {{-- Cart Items --}}
            <div class="col-lg-8">

                @foreach($cart->items as $item)

                    @php
                        $subtotal = $item->book->price * $item->quantity;
                        $total += $subtotal;
                    @endphp

                    <div class="card border-0 shadow-sm mb-3">

                        <div class="card-body">

                            <div class="row align-items-center g-3">

                                {{-- Cover --}}
                                <div class="col-4 col-md-2">

                                    @if($item->book->cover)

                                        <img
                                            src="{{ asset('storage/' . $item->book->cover) }}"
                                            alt="{{ $item->book->title }}"
                                            class="img-fluid rounded"
                                            style="height: 120px; width: 90px; object-fit: cover;"
                                        >

                                    @else

                                        <div
                                            class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="height: 120px; width: 90px;"
                                        >
                                            📖
                                        </div>

                                    @endif

                                </div>


                                {{-- Book Info --}}
                                <div class="col-8 col-md-4">

                                    <h5 class="fw-bold mb-1">
                                        {{ $item->book->title }}
                                    </h5>

                                    <p class="text-muted mb-1">
                                        {{ $item->book->author }}
                                    </p>

                                    <small class="text-muted">
                                        Rp {{ number_format($item->book->price, 0, ',', '.') }}
                                        / buku
                                    </small>

                                </div>


                                {{-- Quantity --}}
                                <div class="col-6 col-md-3">

                                    <form
                                        action="{{ route('cart.update', $item) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PUT')

                                        <label class="form-label small text-muted">
                                            Jumlah
                                        </label>

                                        <div class="input-group">

                                            <input
                                                type="number"
                                                name="quantity"
                                                value="{{ $item->quantity }}"
                                                min="1"
                                                max="{{ $item->book->stock }}"
                                                class="form-control"
                                            >

                                            <button
                                                type="submit"
                                                class="btn btn-outline-dark"
                                            >
                                                Update
                                            </button>

                                        </div>

                                    </form>

                                </div>


                                {{-- Subtotal --}}
                                <div class="col-6 col-md-2">

                                    <small class="text-muted">
                                        Subtotal
                                    </small>

                                    <div class="fw-bold text-success">
                                        Rp {{ number_format($subtotal, 0, ',', '.') }}
                                    </div>

                                </div>


                                {{-- Remove --}}
                                <div class="col-12 col-md-1 text-md-end">

                                    <form
                                        action="{{ route('cart.remove', $item) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger btn-sm"
                                            title="Hapus"
                                        >
                                            🗑️
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Order Summary --}}
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">
                            Ringkasan Pesanan
                        </h4>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Total Item
                            </span>

                            <span>
                                {{ $cart->items->sum('quantity') }}
                            </span>

                        </div>


                        <hr>


                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <span class="fw-bold">
                                Total
                            </span>

                            <span class="fw-bold text-success fs-5">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>
                        

                        <a href="{{ route('checkout') }}" class="btn btn-dark w-100">
                            Checkout / Order
                        </a>

                        <small class="text-muted d-block text-center mt-2">
                            Fitur order akan tersedia pada tahap berikutnya.
                        </small>

                    </div>

                </div>

            </div>

        </div>

    @else

        {{-- Empty Cart --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <div class="display-1 mb-3">
                    🛒
                </div>

                <h3 class="fw-bold">
                    Keranjang Masih Kosong
                </h3>

                <p class="text-muted mb-4">
                    Belum ada buku yang kamu tambahkan ke keranjang.
                </p>

                <a
                    href="{{ route('home') }}"
                    class="btn btn-dark"
                >
                    Mulai Belanja
                </a>

            </div>

        </div>

    @endif

</div>

</body>
</html>