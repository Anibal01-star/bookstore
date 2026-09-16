@extends('layouts.admin')

@section('title', 'Kelola Buku - BookStore')

@section('page-heading', 'Buku')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}

    <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">

        <div>

            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                Catalog
            </p>

            <h1 class="mt-2 font-serif text-3xl font-bold text-wood-100">
                Koleksi Buku
            </h1>

            <p class="mt-2 text-sm text-wood-400">
                Tambahkan, ubah, atau hapus data buku BookStore.
            </p>

        </div>


        <a
            href="{{ route('books.create') }}"
            class="admin-primary"
        >

            <i
                data-lucide="plus"
                class="h-4 w-4"
            ></i>

            Tambah Buku

        </a>

    </div>


    {{-- FLASH ERROR --}}

    @if($errors->any())

        <div
            class="
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

                Terdapat kesalahan

            </div>


            <ul class="mt-2 list-disc space-y-1 pl-5">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- TABLE CARD --}}

    <div class="admin-card overflow-hidden rounded-2xl">


        {{-- TABLE HEADER --}}

        <div
            class="
                flex
                flex-col
                gap-4
                border-b
                border-wood-700/50
                p-5
                md:flex-row
                md:items-center
                md:justify-between
            "
        >

            <div>

                <h2 class="font-serif text-xl text-wood-100">
                    Daftar Buku
                </h2>

                <p class="mt-1 text-xs text-wood-500">
                    {{ $books->count() }} buku tersedia
                </p>

            </div>


            <div class="relative w-full md:w-72">

                <i
                    data-lucide="search"
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
                    type="text"
                    id="bookSearch"
                    placeholder="Cari buku..."
                    class="admin-input pl-10"
                >

            </div>

        </div>


        {{-- TABLE --}}

        <div class="overflow-x-auto">

            <table class="admin-table" id="bookTable">

                <thead>

                    <tr>

                        <th>
                            Buku
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Penulis
                        </th>

                        <th>
                            Harga
                        </th>

                        <th>
                            Stok
                        </th>

                        <th class="text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($books as $book)

                        <tr>


                            {{-- BOOK --}}

                            <td>

                                <div class="flex items-center gap-3">

                                    <div
                                        class="
                                            h-14
                                            w-10
                                            shrink-0
                                            overflow-hidden
                                            rounded-md
                                            border
                                            border-wood-600
                                            bg-wood-800
                                        "
                                    >

                                        @if($book->cover)

                                            <img
                                                src="{{ asset('storage/' . $book->cover) }}"
                                                alt="{{ $book->title }}"
                                                class="h-full w-full object-cover"
                                            >

                                        @else

                                            <div
                                                class="
                                                    flex
                                                    h-full
                                                    w-full
                                                    items-center
                                                    justify-center
                                                    text-wood-600
                                                "
                                            >

                                                <i
                                                    data-lucide="book-open"
                                                    class="h-5 w-5"
                                                ></i>

                                            </div>

                                        @endif

                                    </div>


                                    <div class="min-w-0">

                                        <p
                                            class="
                                                max-w-[220px]
                                                truncate
                                                text-sm
                                                font-semibold
                                                text-wood-100
                                            "
                                        >
                                            {{ $book->title }}
                                        </p>

                                        <p class="mt-1 text-xs text-wood-500">
                                            ID #{{ $book->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- CATEGORY --}}

                            <td>

                                <span
                                    class="
                                        inline-flex
                                        rounded-full
                                        border
                                        border-wood-600
                                        bg-wood-800
                                        px-3
                                        py-1
                                        text-[11px]
                                        text-wood-300
                                    "
                                >

                                    {{ $book->category->name ?? '-' }}

                                </span>

                            </td>


                            {{-- AUTHOR --}}

                            <td>

                                <span class="text-wood-300">
                                    {{ $book->author }}
                                </span>

                            </td>


                            {{-- PRICE --}}

                            <td>

                                <span class="font-semibold text-amberlight">

                                    Rp
                                    {{ number_format($book->price, 0, ',', '.') }}

                                </span>

                            </td>


                            {{-- STOCK --}}

                            <td>

                                @if($book->stock > 10)

                                    <span class="text-emerald-400">
                                        {{ $book->stock }}
                                    </span>

                                @elseif($book->stock > 0)

                                    <span class="text-amberlight">
                                        {{ $book->stock }}
                                    </span>

                                @else

                                    <span class="text-red-400">
                                        Habis
                                    </span>

                                @endif

                            </td>


                            {{-- ACTION --}}

                            <td>

                                <div class="flex justify-end gap-2">


                                    {{-- DETAIL --}}

                                    <a
                                        href="{{ route('book.detail', $book) }}"
                                        target="_blank"
                                        class="
                                            inline-flex
                                            h-9
                                            w-9
                                            items-center
                                            justify-center
                                            rounded-lg
                                            border
                                            border-wood-600
                                            bg-wood-800
                                            text-wood-400
                                            transition
                                            hover:border-wood-500
                                            hover:text-wood-100
                                        "
                                        title="Lihat"
                                    >

                                        <i
                                            data-lucide="eye"
                                            class="h-4 w-4"
                                        ></i>

                                    </a>


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('books.edit', $book) }}"
                                        class="
                                            inline-flex
                                            h-9
                                            w-9
                                            items-center
                                            justify-center
                                            rounded-lg
                                            border
                                            border-wood-600
                                            bg-wood-800
                                            text-amberlight
                                            transition
                                            hover:border-amberlight/40
                                        "
                                        title="Edit"
                                    >

                                        <i
                                            data-lucide="pencil"
                                            class="h-4 w-4"
                                        ></i>

                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('books.destroy', $book) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="
                                                inline-flex
                                                h-9
                                                w-9
                                                items-center
                                                justify-center
                                                rounded-lg
                                                border
                                                border-red-500/20
                                                bg-red-500/5
                                                text-red-400
                                                transition
                                                hover:border-red-500/40
                                                hover:bg-red-500/10
                                            "
                                            title="Hapus"
                                        >

                                            <i
                                                data-lucide="trash-2"
                                                class="h-4 w-4"
                                            ></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="py-16 text-center"
                            >

                                <div
                                    class="
                                        mx-auto
                                        flex
                                        h-14
                                        w-14
                                        items-center
                                        justify-center
                                        rounded-2xl
                                        border
                                        border-wood-700
                                        bg-wood-850
                                        text-wood-500
                                    "
                                >

                                    <i
                                        data-lucide="book-open"
                                        class="h-6 w-6"
                                    ></i>

                                </div>

                                <p class="mt-4 font-serif text-lg text-wood-200">
                                    Belum ada buku
                                </p>

                                <p class="mt-1 text-sm text-wood-500">
                                    Tambahkan buku pertama ke koleksi BookStore.
                                </p>

                                <a
                                    href="{{ route('books.create') }}"
                                    class="admin-primary mt-5"
                                >

                                    <i
                                        data-lucide="plus"
                                        class="h-4 w-4"
                                    ></i>

                                    Tambah Buku

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- SEARCH --}}

@push('scripts')

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const searchInput =
            document.getElementById('bookSearch');

        const rows =
            document.querySelectorAll('#bookTable tbody tr');


        if (!searchInput) {
            return;
        }


        searchInput.addEventListener('input', function () {

            const keyword =
                this.value.toLowerCase().trim();


            rows.forEach(function (row) {

                const text =
                    row.textContent.toLowerCase();


                row.style.display =
                    text.includes(keyword)
                        ? ''
                        : 'none';

            });

        });

    });

</script>

@endpush

@endsection