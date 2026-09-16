<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Buku - BookStore</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a
            href="{{ route('books.index') }}"
            class="navbar-brand"
        >
            BookStore Admin
        </a>

    </div>

</nav>

<div class="container py-5">

    <div
        class="card border-0 shadow-sm mx-auto"
        style="max-width: 750px;"
    >

        <div class="card-body p-4">

            <h3 class="mb-4">
                Tambah Buku
            </h3>

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form
                action="{{ route('books.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Judul Buku
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        placeholder="Masukkan judul buku"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Penulis
                    </label>

                    <input
                        type="text"
                        name="author"
                        class="form-control"
                        value="{{ old('author') }}"
                        placeholder="Nama penulis"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                        placeholder="Deskripsi buku..."
                    >{{ old('description') }}</textarea>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Harga
                        </label>

                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            value="{{ old('price') }}"
                            min="0"
                            placeholder="Contoh: 75000"
                            required
                        >

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stock"
                            class="form-control"
                            value="{{ old('stock', 0) }}"
                            min="0"
                            required
                        >

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Cover Buku
                    </label>

                    <input
                        type="file"
                        name="cover"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>

                </div>

                <div class="d-flex gap-2">

                    <a
                        href="{{ route('books.index') }}"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Buku
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>