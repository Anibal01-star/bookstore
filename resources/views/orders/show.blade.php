<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pesanan - BookStore</title>

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
                href="{{ route('orders.index') }}"
                class="btn btn-outline-dark btn-sm me-2"
            >
                ← Pesanan Saya
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

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">
                        Nomor Pesanan
                    </small>

                    <h3 class="fw-bold">
                        #{{ $order->id }}
                    </h3>

                </div>


                <span class="badge bg-warning text-dark">
                    {{ ucfirst($order->status) }}
                </span>

            </div>

            <hr>

            <small class="text-muted">
                Dibuat pada
            </small>

            <div>
                {{ $order->created_at->format('d M Y, H:i') }}
            </div>

        </div>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h4 class="fw-bold mb-4">
                Buku yang Dipesan
            </h4>


            @foreach($order->items as $item)

                <div class="row align-items-center border-bottom py-3">

                    <div class="col-3 col-md-2">

                        @if($item->book->cover)

                            <img
                                src="{{ asset('storage/' . $item->book->cover) }}"
                                alt="{{ $item->book->title }}"
                                class="img-fluid rounded"
                                style="height: 100px; width: 70px; object-fit: cover;"
                            >

                        @else

                            <div
                                class="bg-light rounded d-flex align-items-center justify-content-center"
                                style="height: 100px; width: 70px;"
                            >
                                📖
                            </div>

                        @endif

                    </div>


                    <div class="col-5 col-md-5">

                        <h6 class="fw-bold mb-1">
                            {{ $item->book->title }}
                        </h6>

                        <small class="text-muted">
                            {{ $item->book->author }}
                        </small>

                    </div>


                    <div class="col-2">

                        <small class="text-muted">
                            Qty
                        </small>

                        <div>
                            {{ $item->quantity }}
                        </div>

                    </div>


                    <div class="col-2 text-end">

                        <small class="text-muted">
                            Subtotal
                        </small>

                        <div class="fw-bold text-success">
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </div>

                    </div>

                </div>

            @endforeach


            <div class="d-flex justify-content-between align-items-center mt-4">

                <span class="fw-bold fs-5">
                    Total Pesanan
                </span>

                <span class="fw-bold text-success fs-4">
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </span>

            </div>

        </div>

    </div>

</div>

</body>
</html>