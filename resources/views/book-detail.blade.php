@extends('layouts.app')

@section('title', $book->title . ' - BookStore')

@section('content')

<div class="relative overflow-hidden">

    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>

    <main class="relative z-10 mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">

        {{-- BACK NAVIGATION --}}
        <div class="mb-8">

            @if(request('from') === 'admin')

                <a
                    href="{{ route('books.index') }}"
                    class="group inline-flex items-center gap-3 text-[#b07b53] transition-all duration-300 hover:text-[#f5ebe2]"
                >

                    <span
                        class="
                            flex h-10 w-10 items-center justify-center
                            rounded-xl
                            border border-[#67422b]/70
                            bg-[#23150e]/80
                            shadow-sm
                            transition-all duration-300
                            group-hover:-translate-x-1
                            group-hover:border-[#895a3a]
                            group-hover:bg-[#382216]
                        "
                    >
                        <i
                            data-lucide="arrow-left"
                            class="h-4 w-4"
                        ></i>
                    </span>

                    <span class="text-sm font-medium">
                        Kembali ke Koleksi Buku
                    </span>

                </a>

            @else

                <a
                    href="{{ route('home') }}"
                    class="group inline-flex items-center gap-3 text-[#b07b53] transition-all duration-300 hover:text-[#f5ebe2]"
                >

                    <span
                        class="
                            flex h-10 w-10 items-center justify-center
                            rounded-xl
                            border border-[#67422b]/70
                            bg-[#23150e]/80
                            shadow-sm
                            transition-all duration-300
                            group-hover:-translate-x-1
                            group-hover:border-[#895a3a]
                            group-hover:bg-[#382216]
                        "
                    >
                        <i
                            data-lucide="arrow-left"
                            class="h-4 w-4"
                        ></i>
                    </span>

                    <span class="text-sm font-medium">
                        Kembali ke Koleksi Buku
                    </span>

                </a>

            @endif

        </div>


        {{-- MAIN BOOK DETAIL --}}
        <section
            class="
                overflow-hidden
                rounded-3xl
                border border-[#67422b]/60
                bg-[#23150e]/90
                shadow-shelf-back
            "
        >

            <div class="grid lg:grid-cols-[400px_1fr]">

                {{-- COVER --}}
                <div
                    class="
                        relative
                        flex
                        min-h-[500px]
                        items-center
                        justify-center
                        overflow-hidden
                        bg-[#2a1a12]
                        p-8
                        lg:min-h-[650px]
                    "
                >

                    <div class="warm-light absolute inset-0"></div>

                    <div class="relative z-10 w-full max-w-[300px]">

                        @if($book->cover)

                            <img
                                src="{{ asset('storage/' . $book->cover) }}"
                                alt="{{ $book->title }}"
                                class="
                                    mx-auto
                                    max-h-[540px]
                                    w-full
                                    rounded-r-2xl
                                    rounded-l-lg
                                    object-cover
                                    shadow-book-3d
                                    transition duration-500
                                    hover:scale-[1.02]
                                "
                            >

                        @else

                            <div
                                class="
                                    mx-auto
                                    flex
                                    aspect-[2/3]
                                    max-h-[540px]
                                    w-full
                                    items-center
                                    justify-center
                                    rounded-r-2xl
                                    rounded-l-lg
                                    bg-gradient-to-br
                                    from-[#4d301f]
                                    to-[#23150e]
                                    shadow-book-3d
                                "
                            >

                                <div class="text-center text-[#dfc2a6]">

                                    <i
                                        data-lucide="book-open"
                                        class="mx-auto h-20 w-20"
                                    ></i>

                                    <p class="mt-5 font-serif text-2xl">
                                        BookStore
                                    </p>

                                    <p class="mt-2 text-sm text-[#b07b53]">
                                        Cover belum tersedia
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- INFORMATION --}}
                <div class="flex flex-col justify-center p-7 md:p-10 lg:p-12">

                    {{-- CATEGORY --}}
                    <div class="mb-5">

                        <span
                            class="
                                inline-flex
                                items-center
                                gap-2
                                rounded-full
                                border border-[#d76239]/30
                                bg-[#d76239]/10
                                px-4 py-2
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                text-[#e57a53]
                            "
                        >

                            <i
                                data-lucide="bookmark"
                                class="h-3.5 w-3.5"
                            ></i>

                            {{ $book->category->name ?? 'Tanpa Kategori' }}

                        </span>

                    </div>


                    {{-- TITLE --}}
                    <h1
                        class="
                            font-serif
                            text-4xl
                            leading-tight
                            text-[#f5ebe2]
                            md:text-5xl
                        "
                    >
                        {{ $book->title }}
                    </h1>


                    {{-- AUTHOR --}}
                    <div class="mt-4 flex items-center gap-2 text-[#b07b53]">

                        <i
                            data-lucide="user"
                            class="h-4 w-4"
                        ></i>

                        <span>
                            Oleh {{ $book->author }}
                        </span>

                    </div>


                    {{-- PRICE --}}
                    <div class="mt-7">

                        <p class="text-sm text-[#b07b53]">
                            Harga
                        </p>

                        <p class="mt-1 text-3xl font-semibold text-[#e57a53]">
                            Rp {{ number_format($book->price, 0, ',', '.') }}
                        </p>

                    </div>


                    {{-- DIVIDER --}}
                    <div class="my-7 h-px bg-[#67422b]/60"></div>


                    {{-- DESCRIPTION --}}
                    <div>

                        <h2
                            class="
                                flex
                                items-center
                                gap-2
                                font-serif
                                text-xl
                                text-[#f5ebe2]
                            "
                        >

                            <i
                                data-lucide="align-left"
                                class="h-5 w-5 text-[#e57a53]"
                            ></i>

                            Deskripsi

                        </h2>

                        <p
                            class="
                                mt-3
                                text-sm
                                leading-7
                                text-[#b07b53]
                                md:text-base
                            "
                        >
                            {{ $book->description ?: 'Belum ada deskripsi untuk buku ini.' }}
                        </p>

                    </div>


                    {{-- STOCK --}}
                    <div
                        class="
                            mt-7
                            rounded-2xl
                            border border-[#67422b]/60
                            bg-[#2a1a12]/70
                            p-4
                        "
                    >

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-3">

                                @if($book->stock > 0)

                                    <div
                                        class="
                                            flex
                                            h-10
                                            w-10
                                            items-center
                                            justify-center
                                            rounded-xl
                                            bg-green-500/10
                                            text-green-400
                                        "
                                    >

                                        <i
                                            data-lucide="package-check"
                                            class="h-5 w-5"
                                        ></i>

                                    </div>

                                    <div>

                                        <p class="text-sm font-medium text-[#f5ebe2]">
                                            Stok tersedia
                                        </p>

                                        <p class="text-xs text-[#b07b53]">
                                            {{ $book->stock }} buku tersedia
                                        </p>

                                    </div>

                                @else

                                    <div
                                        class="
                                            flex
                                            h-10
                                            w-10
                                            items-center
                                            justify-center
                                            rounded-xl
                                            bg-red-500/10
                                            text-red-400
                                        "
                                    >

                                        <i
                                            data-lucide="package-x"
                                            class="h-5 w-5"
                                        ></i>

                                    </div>

                                    <div>

                                        <p class="text-sm font-medium text-red-400">
                                            Stok habis
                                        </p>

                                        <p class="text-xs text-[#b07b53]">
                                            Buku sedang tidak tersedia
                                        </p>

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- CART --}}
                    <div class="mt-6">

                        @auth

                            @if($book->stock > 0)

                                <form
                                    action="{{ route('cart.add', $book) }}"
                                    method="POST"
                                >

                                    @csrf

                                    <div class="flex flex-col gap-3 sm:flex-row">

                                        {{-- QUANTITY --}}
                                        <div class="sm:w-28">

                                            <label
                                                for="quantity"
                                                class="mb-2 block text-xs font-medium text-[#b07b53]"
                                            >
                                                Jumlah
                                            </label>

                                            <input
                                                id="quantity"
                                                type="number"
                                                name="quantity"
                                                value="1"
                                                min="1"
                                                max="{{ $book->stock }}"
                                                class="bookstore-input w-full rounded-xl px-4 py-3 text-center"
                                            >

                                        </div>


                                        {{-- BUTTON --}}
                                        <div class="flex-1 sm:self-end">

                                            <button
                                                type="submit"
                                                class="btn-terracotta inline-flex w-full items-center justify-center gap-2 rounded-xl px-5 py-3.5 font-semibold"
                                            >

                                                <i
                                                    data-lucide="shopping-cart"
                                                    class="h-5 w-5"
                                                ></i>

                                                Tambah ke Keranjang

                                            </button>

                                        </div>

                                    </div>

                                </form>

                            @else

                                <button
                                    type="button"
                                    disabled
                                    class="
                                        inline-flex
                                        w-full
                                        items-center
                                        justify-center
                                        gap-2
                                        rounded-xl
                                        bg-[#4d301f]
                                        px-5
                                        py-3.5
                                        font-semibold
                                        text-[#895a3a]
                                        cursor-not-allowed
                                    "
                                >

                                    <i
                                        data-lucide="package-x"
                                        class="h-5 w-5"
                                    ></i>

                                    Stok Habis

                                </button>

                            @endif

                        @else

                            <a
                                href="{{ route('login') }}"
                                class="btn-terracotta inline-flex w-full items-center justify-center gap-2 rounded-xl px-5 py-3.5 font-semibold"
                            >

                                <i
                                    data-lucide="log-in"
                                    class="h-5 w-5"
                                ></i>

                                Login untuk Membeli

                            </a>

                            <p class="mt-3 text-center text-xs text-[#895a3a]">
                                Login diperlukan untuk menambahkan buku ke keranjang.
                            </p>

                        @endauth

                    </div>


                    {{-- ADDITIONAL INFO --}}
                    <div class="mt-7 grid grid-cols-2 gap-3">

                        <div
                            class="
                                rounded-xl
                                border border-[#67422b]/60
                                bg-[#2a1a12]
                                p-4
                            "
                        >

                            <i
                                data-lucide="shield-check"
                                class="h-5 w-5 text-[#ffdf9e]"
                            ></i>

                            <p class="mt-2 text-xs text-[#b07b53]">
                                Pembelian Aman
                            </p>

                        </div>


                        <div
                            class="
                                rounded-xl
                                border border-[#67422b]/60
                                bg-[#2a1a12]
                                p-4
                            "
                        >

                            <i
                                data-lucide="book-copy"
                                class="h-5 w-5 text-[#ffdf9e]"
                            ></i>

                            <p class="mt-2 text-xs text-[#b07b53]">
                                Koleksi Pilihan
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- BOTTOM NAVIGATION --}}
        <div class="mt-8 flex flex-wrap items-center justify-between gap-3">

            @if(request('from') === 'admin')

                <a
                    href="{{ route('books.index') }}"
                    class="
                        inline-flex
                        items-center
                        gap-2
                        rounded-xl
                        border border-[#67422b]/60
                        bg-[#23150e]/80
                        px-5 py-3
                        text-sm
                        font-medium
                        text-[#dfc2a6]
                        transition
                        hover:border-[#895a3a]
                        hover:bg-[#382216]
                    "
                >

                    <i
                        data-lucide="library"
                        class="h-4 w-4"
                    ></i>

                    Koleksi Buku

                </a>

            @else

                <a
                    href="{{ route('home') }}"
                    class="
                        inline-flex
                        items-center
                        gap-2
                        rounded-xl
                        border border-[#67422b]/60
                        bg-[#23150e]/80
                        px-5 py-3
                        text-sm
                        font-medium
                        text-[#dfc2a6]
                        transition
                        hover:border-[#895a3a]
                        hover:bg-[#382216]
                    "
                >

                    <i
                        data-lucide="library"
                        class="h-4 w-4"
                    ></i>

                    Koleksi Buku

                </a>

            @endif


            @auth

                <a
                    href="{{ route('cart') }}"
                    class="
                        inline-flex
                        items-center
                        gap-2
                        rounded-xl
                        border border-[#67422b]/60
                        bg-[#23150e]/80
                        px-5 py-3
                        text-sm
                        font-medium
                        text-[#dfc2a6]
                        transition
                        hover:border-[#895a3a]
                        hover:bg-[#382216]
                    "
                >

                    <i
                        data-lucide="shopping-cart"
                        class="h-4 w-4"
                    ></i>

                    Lihat Keranjang

                </a>

            @endauth

        </div>

    </main>

</div>

@endsection