<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - BookStore Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
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
            <h2 class="mb-1">Kategori Buku</h2>
            <p class="text-muted mb-0">
                Kelola kategori buku BookStore
            </p>
        </div>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            + Tambah Kategori
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($categories->count())

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover mb-0">

                        <thead class="table-dark">
                            <tr>
                                <th width="70">#</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <strong>
                                            {{ $category->name }}
                                        </strong>
                                    </td>

                                    <td>
                                        {{ $category->description ?: '-' }}
                                    </td>

                                    <td>

                                        <a
                                            href="{{ route('categories.edit', $category) }}"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('categories.destroy', $category) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
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

                <h5>Belum ada kategori</h5>

                <p class="text-muted">
                    Silakan tambahkan kategori buku terlebih dahulu.
                </p>

                <a
                    href="{{ route('categories.create') }}"
                    class="btn btn-primary"
                >
                    Tambah Kategori
                </a>

            </div>
        </div>

    @endif

</div>

</body>
</html>