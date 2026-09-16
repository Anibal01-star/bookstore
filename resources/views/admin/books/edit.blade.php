@extends('layouts.admin')

@section('title', 'Edit Buku - BookStore')

@section('page-heading', 'Edit Buku')

@section('content')

<div class="mx-auto max-w-4xl">

    {{-- HEADER --}}

    <div class="mb-6">

        <a
            href="{{ route('books.index') }}"
            class="mb-4 inline-flex items-center gap-2 text-sm text-wood-500 transition hover:text-wood-200"
        >

            <i data-lucide="arrow-left" class="h-4 w-4"></i>

            Kembali ke Daftar Buku

        </a>


        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
            Catalog
        </p>

        <h1 class="mt-2 font-serif text-3xl font-bold text-wood-100">
            Edit Buku
        </h1>

        <p class="mt-2 text-sm text-wood-400">
            Perbarui informasi buku yang sudah tersimpan di BookStore.
        </p>

    </div>


    {{-- ERROR --}}

    @if ($errors->any())

        <div
            class="
                mb-6
                rounded-xl
                border
                border-red-500/20
                bg-red-500/10
                px-4
                py-4
                text-sm
                text-red-300
            "
        >

            <div class="flex items-center gap-2 font-semibold">

                <i
                    data-lucide="triangle-alert"
                    class="h-4 w-4"
                ></i>

                Terdapat kesalahan pada formulir

            </div>


            <ul class="mt-2 list-disc space-y-1 pl-5">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM CARD --}}

    <div class="admin-card rounded-2xl p-6 md:p-8">

        <form
            action="{{ route('books.update', $book) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- INFORMASI BUKU --}}

            <div class="mb-8">

                <div class="mb-5 flex items-center gap-3">

                    <div
                        class="
                            flex
                            h-10
                            w-10
                            items-center
                            justify-center
                            rounded-xl
                            border
                            border-wood-600
                            bg-wood-850
                            text-terracotta-400
                        "
                    >

                        <i
                            data-lucide="book-open"
                            class="h-5 w-5"
                        ></i>

                    </div>


                    <div>

                        <h2 class="font-serif text-xl text-wood-100">
                            Informasi Buku
                        </h2>

                        <p class="text-xs text-wood-500">
                            Detail utama buku
                        </p>

                    </div>

                </div>


                <div class="space-y-5">


                    {{-- KATEGORI --}}

                    <div>

                        <label
                            for="category_id"
                            class="mb-2 block text-sm font-medium text-wood-200"
                        >
                            Kategori
                        </label>

                        <select
                            id="category_id"
                            name="category_id"
                            class="admin-input"
                            required
                        >

                            <option value="">
                                Pilih kategori
                            </option>

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


                    {{-- JUDUL --}}

                    <div>

                        <label
                            for="title"
                            class="mb-2 block text-sm font-medium text-wood-200"
                        >
                            Judul Buku
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $book->title) }}"
                            placeholder="Masukkan judul buku"
                            class="admin-input"
                            required
                        >

                    </div>


                    {{-- PENULIS --}}

                    <div>

                        <label
                            for="author"
                            class="mb-2 block text-sm font-medium text-wood-200"
                        >
                            Penulis
                        </label>

                        <input
                            id="author"
                            type="text"
                            name="author"
                            value="{{ old('author', $book->author) }}"
                            placeholder="Masukkan nama penulis"
                            class="admin-input"
                            required
                        >

                    </div>


                    {{-- DESKRIPSI --}}

                    <div>

                        <label
                            for="description"
                            class="mb-2 block text-sm font-medium text-wood-200"
                        >
                            Deskripsi
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            placeholder="Masukkan deskripsi buku"
                            class="admin-input resize-y"
                        >{{ old('description', $book->description) }}</textarea>

                    </div>


                    {{-- HARGA + STOK --}}

                    <div class="grid gap-5 md:grid-cols-2">


                        {{-- HARGA --}}

                        <div>

                            <label
                                for="price"
                                class="mb-2 block text-sm font-medium text-wood-200"
                            >
                                Harga
                            </label>

                            <div class="relative">

                                <span
                                    class="
                                        pointer-events-none
                                        absolute
                                        left-3
                                        top-1/2
                                        -translate-y-1/2
                                        text-xs
                                        font-semibold
                                        text-wood-500
                                    "
                                >
                                    Rp
                                </span>

                                <input
                                    id="price"
                                    type="number"
                                    name="price"
                                    value="{{ old('price', $book->price) }}"
                                    min="0"
                                    placeholder="0"
                                    class="admin-input pl-10"
                                    required
                                >

                            </div>

                        </div>


                        {{-- STOK --}}

                        <div>

                            <label
                                for="stock"
                                class="mb-2 block text-sm font-medium text-wood-200"
                            >
                                Stok
                            </label>

                            <div class="relative">

                                <i
                                    data-lucide="boxes"
                                    class="
                                        pointer-events-none
                                        absolute
                                        left-3
                                        top-1/2
                                        h-4
                                        w-4
                                        -translate-y-1/2
                                        text-wood-500
                                    "
                                ></i>

                                <input
                                    id="stock"
                                    type="number"
                                    name="stock"
                                    value="{{ old('stock', $book->stock) }}"
                                    min="0"
                                    placeholder="0"
                                    class="admin-input pl-10"
                                    required
                                >

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- COVER --}}

            <div
                class="
                    border-t
                    border-wood-700/50
                    pt-8
                "
            >

                <div class="mb-5 flex items-center gap-3">

                    <div
                        class="
                            flex
                            h-10
                            w-10
                            items-center
                            justify-center
                            rounded-xl
                            border
                            border-wood-600
                            bg-wood-850
                            text-terracotta-400
                        "
                    >

                        <i
                            data-lucide="image"
                            class="h-5 w-5"
                        ></i>

                    </div>


                    <div>

                        <h2 class="font-serif text-xl text-wood-100">
                            Cover Buku
                        </h2>

                        <p class="text-xs text-wood-500">
                            Kelola gambar sampul buku
                        </p>

                    </div>

                </div>


                <div class="grid gap-6 md:grid-cols-[140px_1fr]">


                    {{-- COVER SAAT INI --}}

                    <div>

                        <p class="mb-2 text-xs font-medium text-wood-400">
                            Cover Saat Ini
                        </p>


                        @if ($book->cover)

                            <div
                                class="
                                    h-44
                                    w-32
                                    overflow-hidden
                                    rounded-xl
                                    border
                                    border-wood-600
                                    bg-wood-850
                                    shadow-lg
                                "
                            >

                                <img
                                    src="{{ asset('storage/' . $book->cover) }}"
                                    alt="{{ $book->title }}"
                                    class="h-full w-full object-cover"
                                >

                            </div>

                        @else

                            <div
                                class="
                                    flex
                                    h-44
                                    w-32
                                    items-center
                                    justify-center
                                    rounded-xl
                                    border
                                    border-dashed
                                    border-wood-600
                                    bg-wood-850
                                    text-wood-600
                                "
                            >

                                <div class="text-center">

                                    <i
                                        data-lucide="image-off"
                                        class="mx-auto h-7 w-7"
                                    ></i>

                                    <p class="mt-2 text-[10px]">
                                        Tidak ada cover
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>


                    {{-- UPLOAD --}}

                    <div>

                        <label
                            for="cover"
                            class="mb-2 block text-sm font-medium text-wood-200"
                        >
                            Ganti Cover
                        </label>


                        <div
                            class="
                                rounded-xl
                                border
                                border-dashed
                                border-wood-600
                                bg-wood-850/70
                                p-5
                            "
                        >

                            <input
                                id="cover"
                                type="file"
                                name="cover"
                                accept=".jpg,.jpeg,.png,.webp"
                                class="
                                    block
                                    w-full
                                    text-sm
                                    text-wood-400
                                    file:mr-4
                                    file:rounded-lg
                                    file:border-0
                                    file:bg-terracotta-500
                                    file:px-4
                                    file:py-2
                                    file:text-xs
                                    file:font-semibold
                                    file:text-white
                                    hover:file:bg-terracotta-600
                                "
                            >


                            <div class="mt-3 flex items-start gap-2">

                                <i
                                    data-lucide="info"
                                    class="mt-0.5 h-4 w-4 shrink-0 text-wood-500"
                                ></i>

                                <p class="text-xs leading-5 text-wood-500">

                                    Kosongkan jika tidak ingin mengganti
                                    cover saat ini. Format yang didukung:
                                    JPG, JPEG, PNG, dan WEBP.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ACTION --}}

            <div
                class="
                    mt-8
                    flex
                    flex-col-reverse
                    gap-3
                    border-t
                    border-wood-700/50
                    pt-6
                    sm:flex-row
                    sm:justify-end
                "
            >

                <a
                    href="{{ route('books.index') }}"
                    class="admin-secondary"
                >

                    <i
                        data-lucide="x"
                        class="h-4 w-4"
                    ></i>

                    Batal

                </a>


                <button
                    type="submit"
                    class="admin-primary"
                >

                    <i
                        data-lucide="save"
                        class="h-4 w-4"
                    ></i>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection