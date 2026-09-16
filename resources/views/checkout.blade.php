<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout - BookStore</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="{{ route('home') }}"
        >
            📚 BookStore
        </a>

        <div class="ms-auto">

            <a
                href="{{ route('cart') }}"
                class="btn btn-outline-dark btn-sm me-2"
            >
                ← Keranjang
            </a>

            <form
                action="{{ route('logout') }}"
                method="POST"
                class="d-inline"
            >
                @csrf

                <button
                    type="submit"
                    class="btn btn-outline-danger btn-sm"
                >
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav>


<div class="container py-5">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Checkout
        </h2>

        <p class="text-muted mb-0">
            Periksa pesanan kamu sebelum melakukan order.
        </p>

    </div>


    <div class="row g-4">

        {{-- Daftar Buku --}}
        <div class="col-lg-8">

            @foreach($cart->items as $item)

                @php
                    $subtotal = $item->book->price * $item->quantity;
                @endphp

                <div class="card border-0 shadow-sm mb-3">

                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col-3 col-md-2">

                                @if($item->book->cover)

                                    <img
                                        src="{{ asset('storage/' . $item->book->cover) }}"
                                        alt="{{ $item->book->title }}"
                                        class="img-fluid rounded"
                                        style="height: 110px; width: 80px; object-fit: cover;"
                                    >

                                @else

                                    <div
                                        class="bg-light rounded d-flex align-items-center justify-content-center"
                                        style="height: 110px; width: 80px;"
                                    >
                                        📖
                                    </div>

                                @endif

                            </div>


                            <div class="col-9 col-md-6">

                                <h5 class="fw-bold mb-1">
                                    {{ $item->book->title }}
                                </h5>

                                <p class="text-muted mb-1">
                                    {{ $item->book->author }}
                                </p>

                                <small class="text-muted">
                                    Rp {{ number_format($item->book->price, 0, ',', '.') }}
                                    ×
                                    {{ $item->quantity }}
                                </small>

                            </div>


                            <div class="col-12 col-md-4 text-md-end mt-3 mt-md-0">

                                <small class="text-muted">
                                    Subtotal
                                </small>

                                <div class="fw-bold text-success">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- Ringkasan --}}
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
                            Total Pembayaran
                        </span>

                        <span class="fw-bold text-success fs-5">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>

                    </div>


                    <form
                        action="{{ route('checkout.store') }}"
                        method="POST"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-dark w-100"
                        >
                            🛍️ Buat Pesanan
                        </button>

                    </form>


                    <a
                        href="{{ route('cart') }}"
                        class="btn btn-outline-secondary w-100 mt-2"
                    >
                        Kembali ke Keranjang
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>