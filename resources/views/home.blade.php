@extends('layouts.app')

@section('title', 'BookStore - Toko Buku Online')

@section('content')

<div class="relative overflow-hidden">

    {{-- Hero Glow --}}
    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>

    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- {{-- Flash Message --}}
        @if(session('success'))
            <div class="alert-message mb-6 rounded-2xl border border-green-500/20 bg-green-900/30 px-5 py-4 text-green-200">
                <div class="flex items-center gap-3">
                    <i data-lucide="circle-check" class="w-5 h-5"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif -->

        @if(session('error'))
            <div class="alert-message mb-6 rounded-2xl border border-red-500/20 bg-red-900/30 px-5 py-4 text-red-200">
                <div class="flex items-center gap-3">
                    <i data-lucide="circle-alert" class="w-5 h-5"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        {{-- HERO --}}
        <section class="relative mb-12 overflow-hidden rounded-[2rem] border border-wood-700/50 bg-wood-900/80 p-8 md:p-12 shadow-shelf-back">

            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-terracotta-500/10 blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 h-72 w-72 rounded-full bg-amberlight/5 blur-3xl"></div>

            <div class="relative grid items-center gap-10 lg:grid-cols-[1.4fr_.6fr]">

                <div>
                    <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-wood-600 bg-wood-850 px-4 py-2 text-sm text-wood-200">
                        <i data-lucide="sparkles" class="h-4 w-4 text-amberlight"></i>
                        <span>Temukan bacaan favoritmu</span>
                    </div>

                    <h1 class="font-serif text-5xl leading-tight text-wood-100 md:text-6xl">
                        Temukan Buku
                        <span class="text-terracotta-400">
                            Favoritmu
                        </span>
                    </h1>

                    <p class="mt-5 max-w-2xl text-base leading-7 text-wood-200 md:text-lg">
                        Jelajahi berbagai koleksi buku dan temukan
                        bacaan yang sesuai dengan minatmu.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a
                            href="#koleksi"
                            class="btn-terracotta inline-flex items-center gap-2 rounded-xl px-5 py-3 font-semibold"
                        >
                            <i data-lucide="book-open" class="h-5 w-5"></i>
                            Jelajahi Koleksi
                        </a>

                        <a
                            href="{{ route('about') }}"
                            class="inline-flex items-center gap-2 rounded-xl border border-wood-600 bg-wood-850 px-5 py-3 font-semibold text-wood-100 transition hover:bg-wood-800"
                        >
                            <i data-lucide="info" class="h-5 w-5"></i>
                            Tentang Kami
                        </a>
                    </div>
                </div>

                <div class="hidden justify-center lg:flex">
                    <div class="relative">
                        <div class="warm-light absolute inset-0"></div>

                        <div class="relative flex h-56 w-40 rotate-[-5deg] items-center justify-center rounded-r-xl rounded-l-md bg-terracotta-600 shadow-book-3d">
                            <div class="absolute left-3 top-0 h-full w-1 bg-black/20"></div>

                            <div class="px-5 text-center">
                                <i data-lucide="book-open" class="mx-auto mb-4 h-14 w-14 text-amberlight"></i>
                                <p class="font-serif text-2xl font-bold text-white">
                                    BookStore
                                </p>
                                <p class="mt-2 text-xs text-amberlight">
                                    Your next story starts here.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        {{-- SEARCH --}}
        <section class="mb-10">

            <form action="{{ route('home') }}" method="GET">

                <div class="rounded-2xl border border-wood-700 bg-wood-900/80 p-4 shadow-shelf-back">

                    <div class="grid gap-3 md:grid-cols-[1fr_220px_120px]">

                        <div class="relative">
                            <i
                                data-lucide="search"
                                class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-wood-400"
                            ></i>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Cari judul buku atau penulis..."
                                class="bookstore-input w-full rounded-xl py-3 pl-12 pr-4"
                            >
                        </div>

                        <select
                            name="category"
                            class="bookstore-input w-full rounded-xl px-4 py-3"
                        >
                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <button
                            type="submit"
                            class="btn-terracotta inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 font-semibold"
                        >
                            <i data-lucide="search" class="h-4 w-4"></i>
                            Cari
                        </button>

                    </div>

                </div>

            </form>

        </section>


        {{-- CATEGORY PILLS --}}
        <section class="mb-10">

            <div class="mb-4 flex items-end justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                        Explore
                    </p>

                    <h2 class="mt-1 font-serif text-3xl text-wood-100">
                        Kategori Buku
                    </h2>
                </div>
            </div>

            <div class="flex gap-3 overflow-x-auto pb-2">

                <a
                    href="{{ route('home') }}"
                    class="whitespace-nowrap rounded-full border px-5 py-2.5 text-sm font-medium transition
                    {{ !request('category') ? 'border-terracotta-500 bg-terracotta-500 text-white' : 'border-wood-600 bg-wood-900 text-wood-200 hover:border-terracotta-500' }}"
                >
                    Semua
                </a>

                @foreach($categories as $category)

                    <a
                        href="{{ route('home', ['category' => $category->id]) }}"
                        class="whitespace-nowrap rounded-full border border-wood-600 bg-wood-900 px-5 py-2.5 text-sm font-medium text-wood-200 transition hover:border-terracotta-500 hover:text-wood-100"
                    >
                        {{ $category->name }}
                    </a>

                @endforeach

            </div>

        </section>


        {{-- BOOK COLLECTION --}}
        <section id="koleksi">

            <div class="mb-7 flex flex-wrap items-end justify-between gap-4">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                        Our Collection
                    </p>

                    <h2 class="mt-1 font-serif text-4xl text-wood-100">
                        Koleksi Buku
                    </h2>

                    <p class="mt-2 text-sm text-wood-400">
                        {{ $books->count() }} buku tersedia
                    </p>
                </div>

                <div class="flex items-center gap-2 text-sm text-wood-400">
                    <i data-lucide="library" class="h-4 w-4"></i>
                    <span>Temukan cerita berikutnya</span>
                </div>

            </div>


            @if($books->count())

                {{-- BOOKS --}}
                <div class="relative rounded-[2rem] border border-wood-700 bg-wood-900/70 p-5 md:p-8 shadow-shelf-back">

                    {{-- Rak atas --}}
                    <div class="mb-8 flex items-center gap-3">
                        <div class="h-2 flex-1 rounded-full bg-wood-700 shadow-shelf-plank"></div>
                        <div class="h-2 w-24 rounded-full bg-wood-600"></div>
                    </div>

                    <div class="grid grid-cols-2 gap-x-4 gap-y-10 sm:grid-cols-3 lg:grid-cols-4">

                        @foreach($books as $book)

                            <article class="group relative">

                                {{-- Book --}}
                                <div class="book-card relative overflow-hidden rounded-r-xl rounded-l-md border border-black/20 bg-wood-700 shadow-book-3d">

                                    {{-- Cover --}}
                                    <div class="relative aspect-[2/3] overflow-hidden bg-wood-800">

                                        @if($book->cover)

                                            <img
                                                src="{{ asset('storage/' . $book->cover) }}"
                                                alt="{{ $book->title }}"
                                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                            >

                                        @else

                                            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-wood-700 to-wood-900">
                                                <div class="text-center text-wood-300">
                                                    <i data-lucide="book-open" class="mx-auto h-12 w-12"></i>
                                                    <p class="mt-3 font-serif text-lg">
                                                        BookStore
                                                    </p>
                                                </div>
                                            </div>

                                        @endif

                                        {{-- Overlay --}}
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-70"></div>

                                        {{-- Category --}}
                                        <div class="absolute left-3 top-3">
                                            <span class="rounded-full bg-black/60 px-3 py-1 text-[11px] font-semibold text-amberlight backdrop-blur">
                                                {{ $book->category->name ?? 'Tanpa Kategori' }}
                                            </span>
                                        </div>

                                    </div>


                                    {{-- Book Info --}}
                                    <div class="p-4">

                                        <h3 class="line-clamp-2 min-h-[3.5rem] font-serif text-lg leading-6 text-wood-100">
                                            {{ $book->title }}
                                        </h3>

                                        <p class="mt-1 truncate text-sm text-wood-400">
                                            {{ $book->author }}
                                        </p>

                                        <div class="mt-4 flex items-center justify-between gap-2">

                                            <div>
                                                <p class="text-xs text-wood-400">
                                                    Harga
                                                </p>

                                                <p class="font-semibold text-terracotta-400">
                                                    Rp {{ number_format($book->price, 0, ',', '.') }}
                                                </p>
                                            </div>

                                            <div class="text-right">
                                                <p class="text-xs text-wood-400">
                                                    Stok
                                                </p>

                                                <p class="text-sm font-medium {{ $book->stock > 0 ? 'text-green-400' : 'text-red-400' }}">
                                                    {{ $book->stock }}
                                                </p>
                                            </div>

                                        </div>


                                        {{-- Actions --}}
                                        <div class="mt-4 space-y-2">

                                            <a
                                                href="{{ route('book.detail', $book) }}"
                                                class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-wood-500 bg-wood-800 px-3 py-2 text-sm font-medium text-wood-100 transition hover:bg-wood-600"
                                            >
                                                <i data-lucide="eye" class="h-4 w-4"></i>
                                                Lihat Detail
                                            </a>


                                            @auth

                                                @if($book->stock > 0)

                                                    <form
                                                        action="{{ route('cart.add', $book) }}"
                                                        method="POST"
                                                    >
                                                        @csrf

                                                        <input
                                                            type="hidden"
                                                            name="quantity"
                                                            value="1"
                                                        >

                                                        <button
                                                            type="submit"
                                                            class="btn-terracotta inline-flex w-full items-center justify-center gap-2 rounded-lg px-3 py-2 text-sm font-semibold"
                                                        >
                                                            <i data-lucide="shopping-cart" class="h-4 w-4"></i>
                                                            Tambah ke Keranjang
                                                        </button>

                                                    </form>

                                                @else

                                                    <button
                                                        type="button"
                                                        disabled
                                                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-wood-600 px-3 py-2 text-sm font-medium text-wood-400"
                                                    >
                                                        <i data-lucide="package-x" class="h-4 w-4"></i>
                                                        Stok Habis
                                                    </button>

                                                @endif

                                            @else

                                                <a
                                                    href="{{ route('login') }}"
                                                    class="btn-terracotta inline-flex w-full items-center justify-center gap-2 rounded-lg px-3 py-2 text-sm font-semibold"
                                                >
                                                    <i data-lucide="log-in" class="h-4 w-4"></i>
                                                    Login untuk Membeli
                                                </a>

                                            @endauth

                                        </div>

                                    </div>

                                </div>

                                {{-- Shelf --}}
                                <div class="shelf-plank mt-3 h-3 rounded-full"></div>

                            </article>

                        @endforeach

                    </div>

                </div>

            @else

                {{-- Empty --}}
                <div class="rounded-[2rem] border border-wood-700 bg-wood-900/80 px-6 py-16 text-center shadow-shelf-back">

                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-wood-800 text-wood-300">
                        <i data-lucide="library-big" class="h-10 w-10"></i>
                    </div>

                    <h3 class="mt-6 font-serif text-3xl text-wood-100">
                        Belum Ada Buku
                    </h3>

                    <p class="mt-2 text-wood-400">
                        Belum ada buku yang tersedia di BookStore.
                    </p>

                </div>

            @endif

        </section>

    </main>

</div>

@endsection