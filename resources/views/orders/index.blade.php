<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Saya - BookStore</title>

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
                href="{{ route('home') }}"
                class="btn btn-outline-dark btn-sm me-2"
            >
                ← Home
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

        <h2 class="fw-bold">
            Pesanan Saya
        </h2>

        <p class="text-muted">
            Riwayat pesanan buku kamu.
        </p>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($orders->count() > 0)

        @foreach($orders as $order)

            <div class="card border-0 shadow-sm mb-3">

                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col-md-6">

                            <small class="text-muted">
                                Nomor Pesanan
                            </small>

                            <h5 class="fw-bold mb-2">
                                #{{ $order->id }}
                            </h5>

                            <small class="text-muted">
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </small>

                        </div>


                        <div class="col-md-3 mt-3 mt-md-0">

                            <small class="text-muted">
                                Total
                            </small>

                            <div class="fw-bold text-success">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </div>

                        </div>


                        <div class="col-md-3 text-md-end mt-3 mt-md-0">

                            <span class="badge bg-warning text-dark mb-2">
                                {{ ucfirst($order->status) }}
                            </span>

                            <br>

                            <a
                                href="{{ route('orders.show', $order) }}"
                                class="btn btn-dark btn-sm"
                            >
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    @else

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <div class="display-1 mb-3">
                    📦
                </div>

                <h3 class="fw-bold">
                    Belum Ada Pesanan
                </h3>

                <p class="text-muted mb-4">
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

    @endif

</div>

</body>
</html>