<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kategori - BookStore</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a
            href="{{ route('categories.index') }}"
            class="navbar-brand"
        >
            BookStore Admin
        </a>
    </div>
</nav>

<div class="container py-5">

    <div
        class="card border-0 shadow-sm mx-auto"
        style="max-width: 650px;"
    >

        <div class="card-body p-4">

            <h3 class="mb-4">
                Tambah Kategori
            </h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('categories.store') }}"
                method="POST"
            >

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Fiksi"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                        placeholder="Deskripsi kategori..."
                    >{{ old('description') }}</textarea>

                </div>

                <div class="d-flex gap-2">

                    <a
                        href="{{ route('categories.index') }}"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Kategori
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>