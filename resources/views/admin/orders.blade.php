<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan - Admin BookStore</title>

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
        }

        .book-cover {
            width: 55px;
            height: 75px;
            object-fit: cover;
            border-radius: 6px;
        }

        .status-badge {
            font-size: 13px;
            padding: 7px 12px;
            border-radius: 20px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            BookStore Admin
        </a>

        <div class="d-flex align-items-center gap-3">

            <a
                href="{{ route('admin.dashboard') }}"
                class="text-white text-decoration-none"
            >
                Dashboard
            </a>

            <a
                href="{{ route('books.index') }}"
                class="text-white text-decoration-none"
            >
                Buku
            </a>

            <a
                href="{{ route('categories.index') }}"
                class="text-white text-decoration-none"
            >
                Kategori
            </a>

            <a
                href="{{ route('admin.users') }}"
                class="text-white text-decoration-none"
            >
                Users
            </a>

            <a
                href="{{ route('admin.messages') }}"
                class="text-white text-decoration-none"
            >
                Pesan
            </a>

            <a
                href="{{ route('admin.orders') }}"
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
            Pesanan
        </h2>

        <p class="text-muted mb-0">
            Kelola dan perbarui status pesanan pelanggan.
        </p>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($orders->isEmpty())

        <div class="card order-card">

            <div class="card-body text-center py-5">

                <h5 class="fw-bold">
                    Belum ada pesanan
                </h5>

                <p class="text-muted mb-0">
                    Pesanan dari user akan muncul di halaman ini.
                </p>

            </div>

        </div>

    @else

        @foreach($orders as $order)

            <div class="card order-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start mb-4">

                        <div>

                            <h5 class="fw-bold mb-1">
                                Pesanan #{{ $order->id }}
                            </h5>

                            <div class="text-muted small">
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </div>

                        </div>


                        <div>

                            @if($order->status === 'pending')

                                <span class="badge bg-warning text-dark status-badge">
                                    Menunggu
                                </span>

                            @elseif($order->status === 'processing')

                                <span class="badge bg-primary status-badge">
                                    Diproses
                                </span>

                            @elseif($order->status === 'completed')

                                <span class="badge bg-success status-badge">
                                    Selesai
                                </span>

                            @elseif($order->status === 'cancelled')

                                <span class="badge bg-danger status-badge">
                                    Dibatalkan
                                </span>

                            @endif

                        </div>

                    </div>


                    <div class="mb-4">

                        <h6 class="fw-bold">
                            Data Pembeli
                        </h6>

                        <p class="mb-1">
                            {{ $order->user->name }}
                        </p>

                        <p class="text-muted mb-0">
                            {{ $order->user->email }}
                        </p>

                    </div>


                    <h6 class="fw-bold mb-3">
                        Detail Buku
                    </h6>


                    @foreach($order->items as $item)

                        <div class="d-flex align-items-center gap-3 border-bottom py-3">

                            @if($item->book->cover)

                                <img
                                    src="{{ asset('storage/' . $item->book->cover) }}"
                                    class="book-cover"
                                    alt="{{ $item->book->title }}"
                                >

                            @else

                                <div
                                    class="book-cover bg-light d-flex align-items-center justify-content-center"
                                >
                                    📚
                                </div>

                            @endif


                            <div class="flex-grow-1">

                                <div class="fw-semibold">
                                    {{ $item->book->title }}
                                </div>

                                <div class="text-muted small">
                                    {{ $item->quantity }} ×
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </div>

                            </div>


                            <div class="fw-semibold">

                                Rp
                                {{ number_format($item->subtotal, 0, ',', '.') }}

                            </div>

                        </div>

                    @endforeach


                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div>

                            <span class="text-muted">
                                Total Pesanan
                            </span>

                            <div class="fs-5 fw-bold">

                                Rp
                                {{ number_format($order->total_price, 0, ',', '.') }}

                            </div>

                        </div>


                        <form
                            action="{{ route('admin.orders.status', $order) }}"
                            method="POST"
                            class="d-flex gap-2 align-items-center"
                        >

                            @csrf
                            @method('PUT')

                            <select
                                name="status"
                                class="form-select"
                                style="width: 170px;"
                            >

                                <option
                                    value="pending"
                                    {{ $order->status === 'pending' ? 'selected' : '' }}
                                >
                                    Menunggu
                                </option>

                                <option
                                    value="processing"
                                    {{ $order->status === 'processing' ? 'selected' : '' }}
                                >
                                    Diproses
                                </option>

                                <option
                                    value="completed"
                                    {{ $order->status === 'completed' ? 'selected' : '' }}
                                >
                                    Selesai
                                </option>

                                <option
                                    value="cancelled"
                                    {{ $order->status === 'cancelled' ? 'selected' : '' }}
                                >
                                    Dibatalkan
                                </option>

                            </select>


                            <button
                                type="submit"
                                class="btn btn-dark"
                            >
                                Update
                            </button>

                        </form>

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