<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - BookStore</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>Admin Dashboard</h1>

            <p class="text-muted">
                Selamat datang, {{ auth()->user()->name }}.
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button class="btn btn-danger">
                Logout
            </button>
        </form>

    </div>


    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Buku</h6>
                    <h2>{{ $totalBooks }}</h2>

                    <a
                        href="{{ route('books.index') }}"
                        class="btn btn-primary btn-sm"
                    >
                        Kelola Buku
                    </a>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Kategori</h6>
                    <h2>{{ $totalCategories }}</h2>

                    <a
                        href="{{ route('categories.index') }}"
                        class="btn btn-primary btn-sm"
                    >
                        Kelola Kategori
                    </a>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">User</h6>
                    <h2>{{ $totalUsers }}</h2>

                    <a
                        href="{{ route('admin.users') }}"
                        class="btn btn-primary btn-sm"
                    >
                        Lihat User
                    </a>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Pesan</h6>
                    <h2>{{ $totalMessages }}</h2>

                    <a
                        href="{{ route('admin.messages') }}"
                        class="btn btn-primary btn-sm"
                    >
                        Lihat Pesan
                    </a>
                </div>
            </div>
        </div>

    </div>


    <div class="col-md-4">

    <div class="card h-100 border-0 shadow-sm">

        <div class="card-body">

            <h5 class="fw-bold">
                Pesanan
            </h5>

            <p class="text-muted">
                Melihat dan mengelola pesanan dari pengguna.
            </p>

            <a
                href="{{ route('admin.orders') }}"
                class="btn btn-dark"
            >
                Kelola Pesanan
            </a>

        </div>

    </div>

</div>

    <div class="card shadow-sm border-0 mt-4">

        <div class="card-body">

            <h4>BookStore Admin</h4>

            <p class="text-muted mb-0">
                Kelola buku, kategori, pengguna, dan pesan
                melalui dashboard administrator.
            </p>

        </div>

    </div>

</div>

</body>
</html>