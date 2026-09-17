@extends('layouts.app')

@section('title', 'BookStore - Temukan Kisah Terbaik')

@section('content')

<div class="relative overflow-hidden">

    {{-- AMBIENT LIGHT --}}
    <div class="pointer-events-none absolute left-1/4 top-10 h-96 w-96 rounded-full bg-[#d76239]/10 blur-3xl"></div>

    <div class="pointer-events-none absolute right-0 top-40 h-80 w-80 rounded-full bg-[#ffdf9e]/5 blur-3xl"></div>

    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <section class="relative mx-auto max-w-7xl px-5 pb-14 pt-12 md:px-8 md:pb-20 md:pt-16">

        <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-10">

            {{-- HERO TEXT --}}
            <div class="relative z-10 lg:col-span-7">

                <div class="inline-flex items-center gap-2 rounded-full border border-[#895a3a]/50 bg-[#23150e]/80 px-4 py-2 shadow-lg backdrop-blur-md">
                    <span class="h-2 w-2 animate-pulse rounded-full bg-[#e57a53] shadow-[0_0_10px_#e57a53]"></span>

                    <span class="text-xs font-semibold tracking-wide text-[#dfc2a6]">
                        Tempat Bernaung Para Pembaca
                    </span>
                </div>

                <h1 class="mt-7 max-w-4xl font-serif text-4xl font-semibold leading-[1.08] text-[#f5ebe2] sm:text-5xl md:text-6xl lg:text-7xl">
                    Temukan Kisah Terbaik,

                    <br>

                    <span class="bg-gradient-to-r from-[#ffdf9e] via-[#e57a53] to-[#d76239] bg-clip-text font-normal italic text-transparent">
                        Rawat Rak Buku
                    </span>

                    Impianmu.
                </h1>

                <p class="mt-6 max-w-xl text-sm leading-7 text-[#b07b53] md:text-base md:leading-8">
                    Jelajahi koleksi buku pilihan dan temukan cerita
                    yang tepat untuk menemani perjalananmu.
                    Dari fiksi, pengembangan diri, hingga berbagai
                    bacaan menarik lainnya.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">

                    <a
                        href="#koleksi-buku"
                        class="btn-terracotta rounded-full px-6 py-3.5 font-semibold"
                    >
                        Jelajahi Koleksi

                        <i data-lucide="arrow-right" class="h-4 w-4"></i>
                    </a>

                    <a
                        href="{{ route('about') }}"
                        class="inline-flex items-center gap-2 rounded-full border border-[#67422b]/70 bg-[#23150e]/70 px-6 py-3.5 text-sm font-medium text-[#dfc2a6] transition hover:border-[#895a3a] hover:bg-[#382216] hover:text-[#f5ebe2]"
                    >
                        <i data-lucide="book-open" class="h-4 w-4"></i>

                        Tentang BookStore
                    </a>

                </div>

                {{-- STATS --}}
                <div class="mt-10 grid max-w-lg grid-cols-3 gap-5 border-t border-[#67422b]/40 pt-6">

                    <div>
                        <p class="font-serif text-xl font-semibold text-[#e57a53] md:text-2xl">
                            {{ $books->count() }}+
                        </p>

                        <p class="mt-1 text-[10px] uppercase tracking-wider text-[#895a3a] md:text-xs">
                            Koleksi Buku
                        </p>
                    </div>

                    <div>
                        <p class="font-serif text-xl font-semibold text-[#e57a53] md:text-2xl">
                            {{ $categories->count() }}
                        </p>

                        <p class="mt-1 text-[10px] uppercase tracking-wider text-[#895a3a] md:text-xs">
                            Kategori
                        </p>
                    </div>

                    <div>
                        <p class="font-serif text-xl font-semibold text-[#e57a53] md:text-2xl">
                            24/7
                        </p>

                        <p class="mt-1 text-[10px] uppercase tracking-wider text-[#895a3a] md:text-xs">
                            Jelajahi
                        </p>
                    </div>

                </div>

            </div>

            {{-- HERO BOOK --}}
            <div class="relative lg:col-span-5 lg:flex lg:justify-end">

                <div class="absolute inset-10 rounded-full bg-[#d76239]/15 blur-3xl"></div>

                <div class="relative z-10 w-full max-w-md rounded-3xl border border-[#895a3a]/40 bg-[#23150e]/90 p-6 shadow-[0_30px_80px_rgba(0,0,0,.55)] backdrop-blur-xl transition duration-500 hover:-translate-y-2">

                    <div class="absolute -right-3 -top-3 inline-flex items-center gap-1.5 rounded-full bg-[#d76239] px-4 py-2 text-xs font-bold text-white shadow-lg">
                        <i data-lucide="star" class="h-3.5 w-3.5 fill-current"></i>
                        Pilihan Koleksi
                    </div>

                    <div class="relative overflow-hidden rounded-2xl border border-[#67422b]/50 bg-[#2a1a12] p-5">

                        <div class="absolute inset-0 bg-gradient-to-br from-[#e57a53]/10 via-transparent to-[#ffdf9e]/5"></div>

                        <div class="relative mx-auto aspect-[2/3] max-w-[230px] overflow-hidden rounded-r-2xl rounded-l-md border-l-4 border-[#4d301f] bg-gradient-to-br from-[#67422b] to-[#23150e] shadow-book-3d">

                            @if($books->isNotEmpty() && $books->first()->cover)

                                <img
                                    src="{{ asset('storage/' . $books->first()->cover) }}"
                                    alt="{{ $books->first()->title }}"
                                    class="h-full w-full object-cover"
                                >

                            @elseif($books->isNotEmpty())

                                <div class="flex h-full flex-col items-center justify-center px-6 text-center">

                                    <i data-lucide="book-open" class="h-16 w-16 text-[#e57a53]"></i>

                                    <p class="mt-5 font-serif text-2xl text-[#f5ebe2]">
                                        {{ $books->first()->title }}
                                    </p>

                                    <p class="mt-2 text-xs text-[#b07b53]">
                                        {{ $books->first()->author }}
                                    </p>

                                </div>

                            @else

                                <div class="flex h-full flex-col items-center justify-center px-6 text-center">

                                    <i data-lucide="book-open" class="h-16 w-16 text-[#e57a53]"></i>

                                    <p class="mt-5 font-serif text-2xl text-[#f5ebe2]">
                                        BookStore
                                    </p>

                                    <p class="mt-2 text-xs text-[#b07b53]">
                                        Temukan cerita berikutnya.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>

                    @if($books->isNotEmpty())

                        <div class="mt-5">

                            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#e57a53]">
                                Buku Pilihan
                            </p>

                            <h2 class="mt-2 truncate font-serif text-2xl text-[#f5ebe2]">
                                {{ $books->first()->title }}
                            </h2>

                            <p class="mt-1 text-sm text-[#b07b53]">
                                {{ $books->first()->author }}
                            </p>

                        </div>

                    @endif

                    <div class="mt-5 flex items-center justify-between border-t border-[#67422b]/40 pt-4">

                        <div>
                            <p class="text-[10px] uppercase tracking-wider text-[#895a3a]">
                                Koleksi
                            </p>

                            <p class="mt-1 text-sm font-semibold text-[#ffdf9e]">
                                Pilihan Pembaca
                            </p>
                        </div>

                        <i data-lucide="sparkles" class="h-5 w-5 text-[#e57a53]"></i>

                    </div>

                </div>

            </div>

        </div>

    </section>


   {{-- =========================================================
    CATALOG / SEARCH
========================================================= --}}
<section
    id="collection"
    class="relative mx-auto mt-8 max-w-7xl px-4 sm:px-6 lg:px-8"
>
    <div
        class="relative overflow-hidden rounded-[26px]
               border border-[#67422b]/60
               bg-gradient-to-br from-[#2a1a12]
               via-[#21130d] to-[#180d09]
               p-6 shadow-2xl
               sm:p-8 lg:p-10"
    >

        {{-- Background glow --}}
        <div
            class="pointer-events-none absolute -right-24 -top-24
                   h-72 w-72 rounded-full
                   bg-[#d76239]/10 blur-[90px]"
        ></div>

        <div
            class="pointer-events-none absolute -bottom-32 -left-24
                   h-64 w-64 rounded-full
                   bg-[#895a3a]/10 blur-[90px]"
        ></div>


        {{-- HEADER + SEARCH --}}
        <div
            class="relative z-10 grid gap-8
                   lg:grid-cols-[0.9fr_1.5fr]
                   lg:items-end"
        >

            {{-- TITLE --}}
            <div>
                <div class="mb-3 flex items-center gap-3">
                    <span
                        class="text-[11px] font-bold uppercase
                               tracking-[0.2em] text-[#e57a53]"
                    >
                        Eksplorasi Katalog
                    </span>

                    <span class="h-px w-10 bg-[#e57a53]/80"></span>
                </div>

                <h2
                    class="font-serif text-3xl font-semibold
                           leading-tight text-[#f5ebe2]
                           sm:text-4xl"
                >
                    Cari Buku
                </h2>

                <p
                    class="mt-2 max-w-md text-sm leading-6
                           text-[#b07b53]"
                >
                    Temukan buku berdasarkan judul,
                    penulis, atau kategori.
                </p>
            </div>


            {{-- SEARCH FORM --}}
            <form
                method="GET"
                action="{{ route('home') }}"
                class="w-full"
            >
                <div
                    class="grid gap-3
                           sm:grid-cols-[1fr_210px_auto]"
                >

                    {{-- SEARCH --}}
                    <div class="relative">
                        <i
                            data-lucide="search"
                            class="pointer-events-none absolute
                                   left-4 top-1/2 h-4 w-4
                                   -translate-y-1/2
                                   text-[#895a3a]"
                        ></i>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari judul atau penulis..."
                            class="bookstore-input h-14
                                   rounded-xl pl-11 pr-4
                                   text-sm"
                        >
                    </div>


                    {{-- CATEGORY SELECT --}}
                    <div class="relative">
                        <i
                            data-lucide="layers-3"
                            class="pointer-events-none absolute
                                   left-4 top-1/2 h-4 w-4
                                   -translate-y-1/2
                                   text-[#895a3a]"
                        ></i>

                        <select
                            name="category"
                            class="bookstore-input h-14 w-full
                                   appearance-none rounded-xl
                                   pl-11 pr-10 text-sm"
                        >
                            <option
                                value=""
                                class="bg-[#23150e]"
                            >
                                Semua Kategori
                            </option>

                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    class="bg-[#23150e]"
                                    @selected(
                                        (string) request('category')
                                        === (string) $category->id
                                    )
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <i
                            data-lucide="chevron-down"
                            class="pointer-events-none absolute
                                   right-4 top-1/2 h-4 w-4
                                   -translate-y-1/2
                                   text-[#895a3a]"
                        ></i>
                    </div>


                    {{-- SEARCH BUTTON --}}
                    <button
                        type="submit"
                        class="btn-terracotta h-14 rounded-xl px-10 font-semibold"
                    >
                        <i
                            data-lucide="search"
                            class="h-4 w-4 shrink-0"
                        ></i>

                        <span>Cari</span>
                    </button>

                </div>
            </form>

        </div>


        {{-- CATEGORY PILLS --}}
        <div
            class="relative z-10 mt-8
                   border-t border-[#67422b]/30 pt-6"
        >

            <div
                class="flex gap-2 overflow-x-auto pb-1
                       scrollbar-hide"
            >

                {{-- SEMUA --}}
                <a
                    href="{{ route('home', array_filter([
                        'search' => request('search')
                    ])) }}"
                    class="shrink-0 rounded-full border
                           px-5 py-2.5 text-xs font-medium
                           transition
                           {{ !request('category')
                                ? 'border-[#e57a53] bg-[#d76239] text-white shadow-lg shadow-[#bc4e28]/20'
                                : 'border-[#67422b]/60 bg-[#23150e]/60 text-[#b07b53] hover:border-[#895a3a] hover:bg-[#382216] hover:text-[#dfc2a6]'
                           }}"
                >
                    Semua
                </a>


                {{-- DATABASE CATEGORIES --}}
                @foreach($categories as $category)

                    <a
                        href="{{ route('home', array_filter([
                            'search' => request('search'),
                            'category' => $category->id
                        ])) }}"
                        class="shrink-0 rounded-full border
                               px-5 py-2.5 text-xs font-medium
                               transition
                               {{ (string) request('category')
                                    === (string) $category->id
                                    ? 'border-[#e57a53] bg-[#d76239] text-white shadow-lg shadow-[#bc4e28]/20'
                                    : 'border-[#67422b]/60 bg-[#23150e]/60 text-[#b07b53] hover:border-[#895a3a] hover:bg-[#382216] hover:text-[#dfc2a6]'
                               }}"
                    >
                        {{ $category->name }}
                    </a>

                @endforeach

            </div>
        </div>


        {{-- ACTIVE FILTER INFO --}}
        @if(request('search') || request('category'))

            <div
                class="relative z-10 mt-5 flex flex-wrap
                       items-center gap-3"
            >

                <span
                    class="text-xs text-[#895a3a]"
                >
                    Filter aktif:
                </span>


                @if(request('search'))
                    <span
                        class="inline-flex items-center gap-2
                               rounded-full border
                               border-[#67422b]/60
                               bg-[#23150e]
                               px-3 py-1.5 text-xs
                               text-[#dfc2a6]"
                    >
                        <i
                            data-lucide="search"
                            class="h-3 w-3"
                        ></i>

                        "{{ request('search') }}"
                    </span>
                @endif


                @if(request('category'))
                    @php
                        $activeCategory = $categories->firstWhere(
                            'id',
                            request('category')
                        );
                    @endphp

                    @if($activeCategory)
                        <span
                            class="inline-flex items-center gap-2
                                   rounded-full border
                                   border-[#67422b]/60
                                   bg-[#23150e]
                                   px-3 py-1.5 text-xs
                                   text-[#dfc2a6]"
                        >
                            <i
                                data-lucide="layers-3"
                                class="h-3 w-3"
                            ></i>

                            {{ $activeCategory->name }}
                        </span>
                    @endif
                @endif


                {{-- RESET --}}
                <a
                    href="{{ route('home') }}"
                    class="ml-auto inline-flex items-center
                           gap-2 rounded-full px-3 py-1.5
                           text-xs text-[#b07b53]
                           transition hover:bg-[#382216]
                           hover:text-[#e57a53]"
                >
                    <i
                        data-lucide="x"
                        class="h-3.5 w-3.5"
                    ></i>

                    Reset filter
                </a>

            </div>

        @endif

    </div>
</section>
    {{-- ========================================================= --}}
    {{-- COLLECTION --}}
    {{-- ========================================================= --}}

    <section
        id="koleksi-buku"
        class="mx-auto max-w-7xl scroll-mt-24 px-5 py-10 md:px-8 md:py-14"
    >

        {{-- HEADER --}}
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

            <div>

                <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#e57a53]">
                    Koleksi Buku
                </span>

                <h2 class="mt-2 font-serif text-3xl text-[#f5ebe2] md:text-4xl">
                    Pilihan Meja Kurator
                </h2>

                <p class="mt-2 text-sm text-[#895a3a]">
                    Menampilkan {{ $books->count() }} buku
                </p>

            </div>

            @if(request('search') || request('category'))

                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 self-start rounded-full border border-[#67422b]/60 bg-[#23150e]/70 px-4 py-2 text-xs text-[#dfc2a6] transition hover:border-[#895a3a] hover:bg-[#382216]"
                >
                    <i data-lucide="x" class="h-3.5 w-3.5"></i>
                    Reset Filter
                </a>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- BOOKSHELF --}}
        {{-- ========================================================= --}}

        <div class="relative overflow-hidden rounded-3xl border-4 border-[#382216]/80 bg-[#23150e] p-4 shadow-[0_30px_70px_rgba(0,0,0,.45)] md:p-7">

            {{-- SIDE PILLARS --}}
            <div class="pointer-events-none absolute inset-y-0 left-0 z-20 w-3 bg-gradient-to-r from-[#382216] via-[#23150e] to-transparent md:w-5"></div>

            <div class="pointer-events-none absolute inset-y-0 right-0 z-20 w-3 bg-gradient-to-l from-[#382216] via-[#23150e] to-transparent md:w-5"></div>


            {{-- FAIRY LIGHTS --}}
            <div class="relative mb-8 flex h-8 items-start justify-around px-6">

                <div class="absolute left-4 right-4 top-1 h-px bg-[#67422b]/60"></div>

                @for($i = 0; $i < 8; $i++)

                    <span class="relative z-10 mt-2 h-2 w-2 rounded-full bg-[#ffdf9e] shadow-[0_0_12px_3px_rgba(255,210,130,.55)]"></span>

                @endfor

            </div>


            {{-- BOOK GRID --}}
            @if($books->isNotEmpty())

                <div class="grid grid-cols-2 gap-x-3 gap-y-8 sm:grid-cols-3 sm:gap-x-5 sm:gap-y-10 lg:grid-cols-4 lg:gap-x-6 xl:grid-cols-5">

                    @foreach($books as $book)

                        <article class="group flex min-w-0 flex-col">

                            {{-- COVER --}}
                            <a
                                href="{{ route('book.detail', $book) }}"
                                class="book-card relative block overflow-hidden rounded-xl"
                            >

                                <div class="relative aspect-[2/3] w-full overflow-hidden bg-[#382216]">

                                    @if($book->cover)

                                        <img
                                            src="{{ asset('storage/' . $book->cover) }}"
                                            alt="{{ $book->title }}"
                                            loading="lazy"
                                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        >

                                    @else

                                        <div class="flex h-full w-full flex-col items-center justify-center bg-gradient-to-br from-[#67422b] to-[#23150e] px-4 text-center">

                                            <i data-lucide="book-open" class="h-10 w-10 text-[#b07b53]"></i>

                                            <p class="mt-3 line-clamp-3 font-serif text-sm leading-5 text-[#dfc2a6]">
                                                {{ $book->title }}
                                            </p>

                                        </div>

                                    @endif

                                    {{-- OVERLAY --}}
                                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-[#150d09]/60 via-transparent to-transparent"></div>

                                    {{-- CATEGORY --}}
                                    <span class="absolute left-3 top-3 z-10 max-w-[calc(100%-1.5rem)] truncate rounded-full border border-[#dfc2a6]/20 bg-[#23150e]/85 px-2.5 py-1 text-[10px] font-semibold text-[#ffdf9e] backdrop-blur-md">
                                        {{ $book->category->name ?? 'Tanpa Kategori' }}
                                    </span>

                                    {{-- STOCK --}}
                                    @if($book->stock > 0)

                                        <span class="absolute bottom-3 right-3 z-10 rounded-full border border-emerald-500/20 bg-[#150d09]/85 px-2.5 py-1 text-[10px] font-semibold text-emerald-400 backdrop-blur-md">
                                            Tersedia
                                        </span>

                                    @else

                                        <span class="absolute bottom-3 right-3 z-10 rounded-full border border-red-500/20 bg-[#150d09]/85 px-2.5 py-1 text-[10px] font-semibold text-red-400 backdrop-blur-md">
                                            Habis
                                        </span>

                                    @endif

                                </div>

                            </a>


                            {{-- BOOK INFO --}}
                            <div class="flex min-h-[188px] flex-col px-1 pt-4">

                                <a
                                    href="{{ route('book.detail', $book) }}"
                                    class="line-clamp-2 min-h-[48px] font-serif text-base font-semibold leading-6 text-[#f5ebe2] transition hover:text-[#ffdf9e]"
                                    title="{{ $book->title }}"
                                >
                                    {{ $book->title }}
                                </a>

                                <p
                                    class="mt-1 min-h-[18px] truncate text-xs text-[#b07b53]"
                                    title="{{ $book->author }}"
                                >
                                    {{ $book->author }}
                                </p>


                                {{-- PRICE --}}
                                <div class="mt-auto border-t border-[#67422b]/40 pt-3">

                                    <div class="flex min-h-[40px] items-end justify-between gap-2">

                                        <div class="min-w-0">

                                            <p class="text-[9px] uppercase tracking-wider text-[#895a3a]">
                                                Harga
                                            </p>

                                            <p class="mt-1 truncate text-sm font-bold text-[#e57a53]">
                                                Rp {{ number_format($book->price, 0, ',', '.') }}
                                            </p>

                                        </div>

                                        <p class="shrink-0 text-[10px] text-[#895a3a]">
                                            Stok {{ $book->stock }}
                                        </p>

                                    </div>


                                    {{-- ACTION BUTTON --}}
                                    <div class="mt-3 grid grid-cols-2 gap-2">

                                        {{-- DETAIL --}}
                                        <a
                                            href="{{ route('book.detail', $book) }}"
                                            class="inline-flex min-h-[40px] items-center justify-center gap-1.5 rounded-xl border border-[#67422b]/60 bg-[#23150e] px-2 text-[11px] font-medium text-[#dfc2a6] transition hover:border-[#895a3a] hover:bg-[#382216] hover:text-[#f5ebe2]"
                                        >
                                            <i data-lucide="eye" class="h-3.5 w-3.5"></i>
                                            Detail
                                        </a>


                                        {{-- AUTH USER --}}
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
                                                        class="inline-flex min-h-[40px] w-full items-center justify-center gap-1.5 rounded-xl bg-gradient-to-br from-[#d76239] to-[#bc4e28] px-2 text-[11px] font-semibold text-white shadow-lg shadow-[#bc4e28]/10 transition hover:-translate-y-0.5"
                                                    >
                                                        <i data-lucide="shopping-bag" class="h-3.5 w-3.5"></i>
                                                        Keranjang
                                                    </button>

                                                </form>

                                            @else

                                                <button
                                                    type="button"
                                                    disabled
                                                    class="inline-flex min-h-[40px] w-full cursor-not-allowed items-center justify-center rounded-xl bg-[#4d301f] px-2 text-[11px] font-semibold text-[#895a3a]"
                                                >
                                                    Habis
                                                </button>

                                            @endif

                                        @else

                                            {{-- GUEST --}}
                                            <a
                                                href="{{ route('login') }}"
                                                class="inline-flex min-h-[40px] items-center justify-center gap-1.5 rounded-xl bg-gradient-to-br from-[#d76239] to-[#bc4e28] px-2 text-[11px] font-semibold text-white transition hover:-translate-y-0.5"
                                            >
                                                <i data-lucide="log-in" class="h-3.5 w-3.5"></i>
                                                Login
                                            </a>

                                        @endauth

                                    </div>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- SHELF --}}
                <div class="shelf-plank mt-8 rounded-md"></div>

                <div class="mt-3 text-center text-[10px] uppercase tracking-[0.2em] text-[#67422b]">
                    Rak Utama BookStore
                </div>

            @else

                {{-- EMPTY STATE --}}
                <div class="flex min-h-[350px] flex-col items-center justify-center rounded-2xl border border-dashed border-[#67422b]/60 bg-[#2a1a12]/50 px-6 text-center">

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl border border-[#67422b]/60 bg-[#382216]">

                        <i data-lucide="book-open" class="h-7 w-7 text-[#895a3a]"></i>

                    </div>

                    <h3 class="mt-5 font-serif text-xl text-[#dfc2a6]">
                        Buku tidak ditemukan
                    </h3>

                    <p class="mt-2 max-w-md text-sm text-[#895a3a]">
                        Coba gunakan kata kunci lain atau pilih kategori yang berbeda.
                    </p>

                    <a
                        href="{{ route('home') }}"
                        class="btn-terracotta mt-5 rounded-xl px-5 py-3 text-sm font-semibold"
                    >
                        Reset Pencarian
                    </a>

                </div>

            @endif

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- CTA --}}
    {{-- ========================================================= --}}

    <section class="mx-auto max-w-7xl px-5 py-14 md:px-8 md:py-20">

        <div class="relative overflow-hidden rounded-3xl border border-[#895a3a]/40 bg-gradient-to-br from-[#382216] via-[#23150e] to-[#150d09] p-8 shadow-2xl md:p-12">

            <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-[#d76239]/10 blur-3xl"></div>

            <div class="relative z-10 grid items-center gap-8 lg:grid-cols-12">

                <div class="lg:col-span-8">

                    <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#e57a53]">
                        Temukan Ceritamu
                    </span>

                    <h2 class="mt-3 max-w-2xl font-serif text-3xl leading-tight text-[#f5ebe2] md:text-4xl">
                        Setiap rak memiliki cerita.
                        Mungkin cerita berikutnya adalah milikmu.
                    </h2>

                    <p class="mt-4 max-w-2xl text-sm leading-7 text-[#b07b53]">
                        Jelajahi koleksi BookStore dan temukan buku
                        yang bisa menjadi bagian dari perjalananmu.
                    </p>

                </div>

                <div class="lg:col-span-4 lg:flex lg:justify-end">

                    <!-- <a
                        href="#koleksi-buku"
                        class="btn-terracotta w-full rounded-full px-7 py-3.5 font-semibold sm:w-auto"
                    >
                        <i data-lucide="library" class="h-4 w-4"></i>
                        Lihat Koleksi
                    </a> -->

                </div>

            </div>

        </div>

    </section>

</div>

@endsection