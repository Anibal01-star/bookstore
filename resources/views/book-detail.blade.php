@extends('layouts.app')

@section('title', $book->title . ' - BookStore')

@section('content')

<div class="relative overflow-hidden">

    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>

    <main class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Back --}}
        <a
            href="{{ route('home') }}"
            class="mb-8 inline-flex items-center gap-2 text-sm text-wood-400 transition hover:text-wood-100"
        >
            <i data-lucide="arrow-left" class="h-4 w-4"></i>
            Kembali ke Koleksi Buku
        </a>


        {{-- Main Book Detail --}}
        <section class="overflow-hidden rounded-[2rem] border border-wood-700 bg-wood-900/80 shadow-shelf-back">

            <div class="grid lg:grid-cols-[420px_1fr]">

                {{-- COVER --}}
                <div class="relative flex min-h-[500px] items-center justify-center overflow-hidden bg-wood-850 p-8 lg:min-h-[650px]">

                    <div class="warm-light absolute inset-0"></div>

                    <div class="relative z-10 w-full max-w-[320px]">

                        @if($book->cover)

                            <img
                                src="{{ asset('storage/' . $book->cover) }}"
                                alt="{{ $book->title }}"
                                class="mx-auto max-h-[550px] w-full rounded-r-2xl rounded-l-lg object-cover shadow-book-3d transition duration-500 hover:scale-[1.02]"
                            >

                        @else

                            <div class="mx-auto flex aspect-[2/3] max-h-[550px] w-full items-center justify-center rounded-r-2xl rounded-l-lg bg-gradient-to-br from-wood-700 to-wood-900 shadow-book-3d">

                                <div class="text-center text-wood-300">

                                    <i
                                        data-lucide="book-open"
                                        class="mx-auto h-20 w-20"
                                    ></i>

                                    <p class="mt-5 font-serif text-2xl">
                                        BookStore
                                    </p>

                                    <p class="mt-2 text-sm text-wood-400">
                                        Cover belum tersedia
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- INFORMATION --}}
                <div class="flex flex-col justify-center p-7 md:p-10 lg:p-12">

                    {{-- Category --}}
                    <div class="mb-5">

                        <span class="inline-flex items-center gap-2 rounded-full border border-terracotta-500/30 bg-terracotta-500/10 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-terracotta-400">

                            <i
                                data-lucide="bookmark"
                                class="h-3.5 w-3.5"
                            ></i>

                            {{ $book->category->name ?? 'Tanpa Kategori' }}

                        </span>

                    </div>


                    {{-- Title --}}
                    <h1 class="font-serif text-4xl leading-tight text-wood-100 md:text-5xl">

                        {{ $book->title }}

                    </h1>


                    {{-- Author --}}
                    <div class="mt-4 flex items-center gap-2 text-wood-400">

                        <i
                            data-lucide="user"
                            class="h-4 w-4"
                        ></i>

                        <span>
                            Oleh {{ $book->author }}
                        </span>

                    </div>


                    {{-- Price --}}
                    <div class="mt-7">

                        <p class="text-sm text-wood-400">
                            Harga
                        </p>

                        <p class="mt-1 text-3xl font-semibold text-terracotta-400">

                            Rp {{ number_format($book->price, 0, ',', '.') }}

                        </p>

                    </div>


                    {{-- Divider --}}
                    <div class="my-7 h-px bg-wood-700"></div>


                    {{-- Description --}}
                    <div>

                        <h2 class="flex items-center gap-2 font-serif text-xl text-wood-100">

                            <i
                                data-lucide="align-left"
                                class="h-5 w-5 text-terracotta-400"
                            ></i>

                            Deskripsi

                        </h2>

                        <p class="mt-3 text-sm leading-7 text-wood-400 md:text-base">

                            {{ $book->description ?: 'Belum ada deskripsi untuk buku ini.' }}

                        </p>

                    </div>


                    {{-- Stock --}}
                    <div class="mt-7 rounded-2xl border border-wood-700 bg-wood-850/70 p-4">

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-3">

                                @if($book->stock > 0)

                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-500/10 text-green-400">

                                        <i
                                            data-lucide="package-check"
                                            class="h-5 w-5"
                                        ></i>

                                    </div>

                                    <div>

                                        <p class="text-sm font-medium text-wood-100">
                                            Stok tersedia
                                        </p>

                                        <p class="text-xs text-wood-400">
                                            {{ $book->stock }} buku tersedia
                                        </p>

                                    </div>

                                @else

                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-500/10 text-red-400">

                                        <i
                                            data-lucide="package-x"
                                            class="h-5 w-5"
                                        ></i>

                                    </div>

                                    <div>

                                        <p class="text-sm font-medium text-red-400">
                                            Stok habis
                                        </p>

                                        <p class="text-xs text-wood-400">
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

                                        {{-- Quantity --}}
                                        <div class="sm:w-28">

                                            <label
                                                for="quantity"
                                                class="mb-2 block text-xs font-medium text-wood-400"
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


                                        {{-- Button --}}
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
                                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-wood-700 px-5 py-3.5 font-semibold text-wood-400"
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

                            <p class="mt-3 text-center text-xs text-wood-500">
                                Login diperlukan untuk menambahkan buku ke keranjang.
                            </p>

                        @endauth

                    </div>


                    {{-- Additional Info --}}
                    <div class="mt-7 grid grid-cols-2 gap-3">

                        <div class="rounded-xl border border-wood-700 bg-wood-850 p-4">

                            <i
                                data-lucide="shield-check"
                                class="h-5 w-5 text-amberlight"
                            ></i>

                            <p class="mt-2 text-xs text-wood-400">
                                Pembelian Aman
                            </p>

                        </div>

                        <div class="rounded-xl border border-wood-700 bg-wood-850 p-4">

                            <i
                                data-lucide="book-copy"
                                class="h-5 w-5 text-amberlight"
                            ></i>

                            <p class="mt-2 text-xs text-wood-400">
                                Koleksi Pilihan
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- Bottom Navigation --}}
        <div class="mt-8 flex flex-wrap justify-between gap-3">

            <a
                href="{{ route('home') }}"
                class="inline-flex items-center gap-2 rounded-xl border border-wood-700 bg-wood-900 px-5 py-3 text-sm font-medium text-wood-200 transition hover:bg-wood-800"
            >

                <i data-lucide="library" class="h-4 w-4"></i>

                Kembali ke Koleksi

            </a>


            @auth

                <a
                    href="{{ route('cart') }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-wood-700 bg-wood-900 px-5 py-3 text-sm font-medium text-wood-200 transition hover:bg-wood-800"
                >

                    <i data-lucide="shopping-cart" class="h-4 w-4"></i>

                    Lihat Keranjang

                </a>

            @endauth

        </div>

    </main>

</div>

@endsection