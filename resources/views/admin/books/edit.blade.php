<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Buku - BookStore</title>

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
                Edit Buku
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
                action="{{ route('books.update', $book) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                        required
                    >

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}
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
                        value="{{ old('title', $book->title) }}"
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
                        value="{{ old('author', $book->author) }}"
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
                    >{{ old('description', $book->description) }}</textarea>

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
                            value="{{ old('price', $book->price) }}"
                            min="0"
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
                            value="{{ old('stock', $book->stock) }}"
                            min="0"
                            required
                        >

                    </div>

                </div>

                @if ($book->cover)

                    <div class="mb-3">

                        <label class="form-label">
                            Cover Saat Ini
                        </label>

                        <br>

                        <img
                            src="{{ asset('storage/' . $book->cover) }}"
                            alt="{{ $book->title }}"
                            width="120"
                            height="160"
                            style="object-fit: cover; border-radius: 8px;"
                        >

                    </div>

                @endif

                <div class="mb-4">

                    <label class="form-label">
                        Ganti Cover
                    </label>

                    <input
                        type="file"
                        name="cover"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti cover.
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
                        Update Buku
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>