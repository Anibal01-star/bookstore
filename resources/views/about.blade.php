<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Pesanan - BookStore</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: #f5f7fb;
        }

        .navbar {
            background: #111827;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .page-header {
            margin-top: 40px;
            margin-bottom: 30px;
        }

        .order-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .order-header {
            background: #fafafa;
            border-bottom: 1px solid #eee;
            padding: 20px 24px;
        }

        .order-body {
            padding: 24px;
        }

        .book-cover {
            width: 60px;
            height: 80px;
            object-fit: cover;
            border-radius: 7px;
            background: #f1f1f1;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-processing {
            background: #cfe2ff;
            color: #084298;
        }

        .status-completed {
            background: #d1e7dd;
            color: #0f5132;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #842029;
        }

        .empty-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark">
    <div class="container">

        <a
            class="navbar-brand"
            href="{{ route('home') }}"
        >
            BookStore
        </a>

        <div class="d-flex align-items-center gap-3">

            <a
                href="{{ route('home') }}"
                class="text-white text-decoration-none"
            >
                Home
            </a>

            <a
                href="{{ route('about') }}"
                class="text-white text-decoration-none"
            >
                About
            </a>

            <a
                href="{{ route('contact') }}"
                class="text-white text-decoration-none"
            >
                Contact
            </a>

            <a
                href="{{ route('cart') }}"
                class="text-white text-decoration-none"
            >
                Cart
            </a>

            <a
                href="{{ route('orders.index') }}"
                class="text-white text-decoration-none fw-bold"
            >
                Pesanan
            </a>

            <form
                action="{{ route('logout') }}"
                method="POST"
                class="d-inline"
            >
                @csrf

                <button
                    type="submit"
                    class="btn btn-outline-light btn-sm"
                >
                    Logout
                </button>

            </form>

        </div>

    </div>
</nav>


<div class="container">

    <div class="page-header">

        <h2 class="fw-bold mb-1">
            Riwayat Pesanan
        </h2>

        <p class="text-muted mb-0">
            Lihat pesanan dan status pemesanan buku kamu.
        </p>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($orders->isEmpty())

        <div class="card empty-card">

            <div class="card-body text-center py-5">

                <div
                    style="font-size: 50px;"
                    class="mb-3"
                >
                    📦
                </div>

                <h5 class="fw-bold">
                    Belum Ada Pesanan
                </h5>

                <p class="text-muted">
                    Kamu belum memiliki riwayat pesanan.
                </p>

                <a
                    href="{{ route('home') }}"
                    class="btn btn-dark"
                >
                    Mulai Belanja
                </a>

            </div>

        </div>

    @else

        @foreach($orders as $order)

            <div class="card order-card">

                {{-- HEADER ORDER --}}
                <div class="order-header">

                    <div class="row align-items-center">

                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Pesanan #{{ $order->id }}
                            </div>

                            <div class="fw-semibold">
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </div>

                        </div>


                        <div class="col-md-6 text-md-end mt-3 mt-md-0">

                            {{-- STATUS --}}
                            @if($order->status === 'pending')

                                <span class="status-badge status-pending">
                                    ⏳ Menunggu Konfirmasi
                                </span>

                            @elseif($order->status === 'processing')

                                <span class="status-badge status-processing">
                                    🚚 Sedang Diproses
                                </span>

                            @elseif($order->status === 'completed')

                                <span class="status-badge status-completed">
                                    ✓ Pesanan Selesai
                                </span>

                            @elseif($order->status === 'cancelled')

                                <span class="status-badge status-cancelled">
                                    ✕ Pesanan Dibatalkan
                                </span>

                            @else

                                <span class="status-badge bg-secondary text-white">
                                    {{ ucfirst($order->status) }}
                                </span>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- BODY ORDER --}}
                <div class="order-body">

                    <h6 class="fw-bold mb-3">
                        Buku yang Dipesan
                    </h6>


                    @foreach($order->items as $item)

                        <div class="d-flex align-items-center gap-3 border-bottom py-3">

                            {{-- COVER --}}
                            @if($item->book->cover)

                                <img
                                    src="{{ asset('storage/' . $item->book->cover) }}"
                                    class="book-cover"
                                    alt="{{ $item->book->title }}"
                                >

                            @else

                                <div
                                    class="book-cover d-flex align-items-center justify-content-center"
                                >
                                    📚
                                </div>

                            @endif


                            {{-- BOOK INFO --}}
                            <div class="flex-grow-1">

                                <div class="fw-semibold">
                                    {{ $item->book->title }}
                                </div>

                                <div class="text-muted small">
                                    {{ $item->quantity }} ×
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </div>

                            </div>


                            {{-- SUBTOTAL --}}
                            <div class="fw-semibold">

                                Rp
                                {{ number_format($item->subtotal, 0, ',', '.') }}

                            </div>

                        </div>

                    @endforeach


                    {{-- TOTAL --}}
                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div>

                            <div class="text-muted small">
                                Total Pesanan
                            </div>

                            <div class="fs-5 fw-bold">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </div>

                        </div>


                        <a
                            href="{{ route('orders.show', $order) }}"
                            class="btn btn-outline-dark"
                        >
                            Lihat Detail
                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    @endif

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>