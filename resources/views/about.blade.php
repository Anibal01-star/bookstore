@extends('layouts.app')

@section('title', 'About Us - BookStore')

@section('content')

<div class="relative overflow-hidden">

    {{-- BACKGROUND GLOW --}}
    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>

    <main class="relative z-10 mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">

        {{-- BACK --}}
        <a
            href="{{ route('home') }}"
            class="mb-6 inline-flex items-center gap-2 text-sm text-wood-400 transition hover:text-wood-100"
        >
            <i data-lucide="arrow-left" class="h-4 w-4"></i>
            Kembali ke Home
        </a>


        {{-- HERO --}}
        <section class="relative overflow-hidden rounded-3xl border border-wood-700 bg-wood-900/90 px-6 py-12 shadow-shelf-back sm:px-10 md:py-16">

            <div class="warm-light absolute -right-20 -top-20 h-48 w-48 rounded-full"></div>

            <div class="relative z-10 max-w-3xl">

                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-terracotta-400">
                    About BookStore
                </p>

                <h1 class="mt-3 font-serif text-4xl leading-tight text-wood-100 sm:text-5xl md:text-6xl">
                    Tempat untuk
                    <span class="text-terracotta-400">
                        Menemukan Cerita
                    </span>
                </h1>

                <p class="mt-5 max-w-2xl text-sm leading-7 text-wood-400 sm:text-base">
                    BookStore adalah platform toko buku sederhana yang membantu
                    kamu menemukan, menjelajahi, dan memesan berbagai koleksi
                    buku dalam satu tempat.
                </p>

            </div>

        </section>


        {{-- ABOUT CONTENT --}}
        <section class="mt-8 grid gap-6 lg:grid-cols-3">

            {{-- DESCRIPTION --}}
            <div class="rounded-2xl border border-wood-700 bg-wood-900/85 p-6 shadow-shelf-back sm:p-8 lg:col-span-2">

                <div class="mb-5 flex items-center gap-3">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-terracotta-500/10 text-terracotta-400">

                        <i
                            data-lucide="library"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-terracotta-400">
                            Tentang Kami
                        </p>

                        <h2 class="font-serif text-2xl text-wood-100">
                            Mengenal BookStore
                        </h2>

                    </div>

                </div>

                <div class="space-y-4 text-sm leading-7 text-wood-400">

                    <p>
                        BookStore merupakan aplikasi toko buku berbasis web
                        yang dirancang untuk memberikan pengalaman berbelanja
                        buku secara sederhana dan nyaman.
                    </p>

                    <p>
                        Pengguna dapat melihat koleksi buku, mencari buku
                        berdasarkan judul atau penulis, melihat detail buku,
                        menambahkan buku ke keranjang, hingga melakukan
                        pemesanan.
                    </p>

                    <p>
                        Setiap buku memiliki cerita dan pengalaman yang berbeda.
                        BookStore hadir sebagai ruang sederhana untuk membantu
                        kamu menemukan buku yang sesuai dengan minatmu.
                    </p>

                </div>

            </div>


            {{-- SIDE CARD --}}
            <div class="rounded-2xl border border-wood-700 bg-wood-900/85 p-6 shadow-shelf-back sm:p-8">

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-terracotta-500/10 text-terracotta-400">

                    <i
                        data-lucide="book-open"
                        class="h-6 w-6"
                    ></i>

                </div>

                <h2 class="mt-5 font-serif text-2xl text-wood-100">
                    Your Personal Shelf
                </h2>

                <p class="mt-3 text-sm leading-6 text-wood-400">
                    Jelajahi berbagai buku dan temukan cerita yang ingin
                    kamu bawa pulang.
                </p>

                <a
                    href="{{ route('home') }}"
                    class="btn-terracotta mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl px-5 py-3 font-semibold"
                >

                    <i
                        data-lucide="search"
                        class="h-5 w-5"
                    ></i>

                    Jelajahi Buku

                </a>

            </div>

        </section>


        {{-- FEATURES --}}
        <section class="mt-10">

            <div class="mb-5">

                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                    Fitur BookStore
                </p>

                <h2 class="mt-1 font-serif text-3xl text-wood-100">
                    Semua dalam Satu Rak
                </h2>

            </div>


            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                {{-- SEARCH --}}
                <div class="rounded-2xl border border-wood-700 bg-wood-900/85 p-5 shadow-shelf-back transition hover:-translate-y-1">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-wood-850 text-terracotta-400">

                        <i
                            data-lucide="search"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <h3 class="mt-4 font-serif text-xl text-wood-100">
                        Cari Buku
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-wood-500">
                        Cari buku berdasarkan judul atau nama penulis.
                    </p>

                </div>


                {{-- CART --}}
                <div class="rounded-2xl border border-wood-700 bg-wood-900/85 p-5 shadow-shelf-back transition hover:-translate-y-1">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-wood-850 text-terracotta-400">

                        <i
                            data-lucide="shopping-cart"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <h3 class="mt-4 font-serif text-xl text-wood-100">
                        Keranjang
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-wood-500">
                        Simpan buku pilihanmu sebelum melakukan pemesanan.
                    </p>

                </div>


                {{-- ORDER --}}
                <div class="rounded-2xl border border-wood-700 bg-wood-900/85 p-5 shadow-shelf-back transition hover:-translate-y-1">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-wood-850 text-terracotta-400">

                        <i
                            data-lucide="receipt"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <h3 class="mt-4 font-serif text-xl text-wood-100">
                        Pesanan
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-wood-500">
                        Lihat detail dan status pesanan yang telah dibuat.
                    </p>

                </div>


                {{-- CONTACT --}}
                <div class="rounded-2xl border border-wood-700 bg-wood-900/85 p-5 shadow-shelf-back transition hover:-translate-y-1">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-wood-850 text-terracotta-400">

                        <i
                            data-lucide="message-circle"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <h3 class="mt-4 font-serif text-xl text-wood-100">
                        Contact Admin
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-wood-500">
                        Hubungi admin apabila membutuhkan bantuan.
                    </p>

                </div>

            </div>

        </section>


        {{-- CTA --}}
        <section class="mt-10 overflow-hidden rounded-2xl border border-wood-700 bg-wood-850 px-6 py-10 text-center shadow-shelf-back sm:px-10">

            <div class="mx-auto max-w-2xl">

                <i
                    data-lucide="quote"
                    class="mx-auto h-7 w-7 text-terracotta-400"
                ></i>

                <p class="mt-4 font-serif text-2xl leading-relaxed text-wood-100 sm:text-3xl">
                    “Satu buku dapat membuka pintu menuju
                    dunia yang berbeda.”
                </p>

                <p class="mt-4 text-sm text-wood-500">
                    Temukan cerita berikutnya bersama BookStore.
                </p>

                <a
                    href="{{ route('home') }}"
                    class="btn-terracotta mt-6 inline-flex items-center gap-2 rounded-xl px-6 py-3 font-semibold"
                >

                    Mulai Menjelajah

                    <i
                        data-lucide="arrow-right"
                        class="h-5 w-5"
                    ></i>

                </a>

            </div>

        </section>

    </main>

</div>

@endsection