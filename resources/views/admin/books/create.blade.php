@extends('layouts.admin')

@section('title', 'Tambah Buku - BookStore')

@section('page-heading', 'Tambah Buku')

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
            Tambah Buku
        </h1>

        <p class="mt-2 text-sm text-wood-400">
            Tambahkan buku baru ke dalam koleksi BookStore.
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
            action="{{ route('books.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


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
                            Masukkan detail utama buku
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
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
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
                            value="{{ old('title') }}"
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
                            value="{{ old('author') }}"
                            placeholder="Nama penulis"
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
                            placeholder="Deskripsi buku..."
                            class="admin-input resize-y"
                        >{{ old('description') }}</textarea>

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
                                    value="{{ old('price') }}"
                                    min="0"
                                    placeholder="75000"
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
                                    value="{{ old('stock', 0) }}"
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
                            Tambahkan gambar sampul buku
                        </p>

                    </div>

                </div>


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

                    <label
                        for="cover"
                        class="mb-3 block text-sm font-medium text-wood-200"
                    >
                        Upload Cover
                    </label>


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

                            Format yang didukung: JPG, JPEG, PNG,
                            dan WEBP. Maksimal ukuran file 2 MB.

                        </p>

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

                    Simpan Buku

                </button>

            </div>

        </form>

    </div>

</div>

@endsection