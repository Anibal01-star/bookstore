<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Buku - BookStore Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a
            href="{{ route('admin.dashboard') }}"
            class="navbar-brand"
        >
            BookStore Admin
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button class="btn btn-outline-light btn-sm">
                Logout
            </button>
        </form>

    </div>
</nav>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">
                Data Buku
            </h2>

            <p class="text-muted mb-0">
                Kelola data buku BookStore
            </p>
        </div>

        <a
            href="{{ route('books.create') }}"
            class="btn btn-primary"
        >
            + Tambah Buku
        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($books->count())

        <div class="card border-0 shadow-sm">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-dark">

                            <tr>

                                <th width="60">
                                    #
                                </th>

                                <th width="100">
                                    Cover
                                </th>

                                <th>
                                    Buku
                                </th>

                                <th>
                                    Kategori
                                </th>

                                <th>
                                    Harga
                                </th>

                                <th>
                                    Stok
                                </th>

                                <th width="180">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($books as $book)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>

                                        @if ($book->cover)

                                            <img
                                                src="{{ asset('storage/' . $book->cover) }}"
                                                alt="{{ $book->title }}"
                                                width="70"
                                                height="90"
                                                style="object-fit: cover; border-radius: 8px;"
                                            >

                                        @else

                                            <div
                                                class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                                style="width:70px;height:90px;border-radius:8px;"
                                            >
                                                No Cover
                                            </div>

                                        @endif

                                    </td>

                                    <td>

                                        <strong>
                                            {{ $book->title }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            {{ $book->author }}
                                        </small>

                                    </td>

                                    <td>
                                        <span class="badge text-bg-primary">
                                            {{ $book->category->name }}
                                        </span>
                                    </td>

                                    <td>
                                        Rp {{ number_format($book->price, 0, ',', '.') }}
                                    </td>

                                    <td>

                                        @if ($book->stock > 0)

                                            <span class="badge text-bg-success">
                                                {{ $book->stock }}
                                            </span>

                                        @else

                                            <span class="badge text-bg-danger">
                                                Habis
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <a
                                            href="{{ route('books.edit', $book) }}"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('books.destroy', $book) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    @else

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <h5>
                    Belum ada buku
                </h5>

                <p class="text-muted">
                    Silakan tambahkan data buku terlebih dahulu.
                </p>

                <a
                    href="{{ route('books.create') }}"
                    class="btn btn-primary"
                >
                    + Tambah Buku
                </a>

            </div>

        </div>

    @endif

</div>

</body>
</html>