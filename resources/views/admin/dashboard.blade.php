@extends('layouts.admin')

@section('title', 'Dashboard Admin - BookStore')

@section('page-heading', 'Dashboard')

@section('content')

<div class="space-y-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">

        <div>

            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                Overview
            </p>

            <h1 class="mt-2 font-serif text-3xl font-bold text-wood-100 md:text-4xl">
                Selamat datang kembali,
                {{ auth()->user()->name }}
            </h1>

            <p class="mt-2 max-w-2xl text-sm leading-6 text-wood-400">
                Kelola koleksi buku, kategori, pengguna, pesan,
                dan pesanan BookStore dari satu tempat.
            </p>

        </div>

        <a
            href="{{ route('home') }}"
            class="admin-secondary self-start md:self-auto"
        >
            <i data-lucide="external-link" class="h-4 w-4"></i>
            Lihat Website
        </a>

    </div>


    {{-- ========================================================= --}}
    {{-- STATISTICS --}}
    {{-- ========================================================= --}}

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">


        {{-- TOTAL BUKU --}}

        <div class="stat-card">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-wood-500">
                        Total Buku
                    </p>

                    <h2 class="mt-3 font-serif text-4xl font-bold text-wood-100">
                        {{ $totalBooks }}
                    </h2>

                    <p class="mt-2 text-xs text-wood-500">
                        Koleksi buku
                    </p>

                </div>


                <div
                    class="
                        flex
                        h-11
                        w-11
                        items-center
                        justify-center
                        rounded-xl
                        border
                        border-wood-600
                        bg-wood-800
                        text-terracotta-400
                    "
                >

                    <i
                        data-lucide="book-open"
                        class="h-5 w-5"
                    ></i>

                </div>

            </div>


            <a
                href="{{ route('books.index') }}"
                class="
                    mt-5
                    inline-flex
                    items-center
                    gap-1.5
                    text-xs
                    font-semibold
                    text-terracotta-400
                    transition
                    hover:text-terracotta-300
                "
            >

                Kelola Buku

                <i
                    data-lucide="arrow-up-right"
                    class="h-3.5 w-3.5"
                ></i>

            </a>

        </div>


        {{-- KATEGORI --}}

        <div class="stat-card">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-wood-500">
                        Kategori
                    </p>

                    <h2 class="mt-3 font-serif text-4xl font-bold text-wood-100">
                        {{ $totalCategories }}
                    </h2>

                    <p class="mt-2 text-xs text-wood-500">
                        Kategori buku
                    </p>

                </div>


                <div
                    class="
                        flex
                        h-11
                        w-11
                        items-center
                        justify-center
                        rounded-xl
                        border
                        border-wood-600
                        bg-wood-800
                        text-terracotta-400
                    "
                >

                    <i
                        data-lucide="tags"
                        class="h-5 w-5"
                    ></i>

                </div>

            </div>


            <a
                href="{{ route('categories.index') }}"
                class="
                    mt-5
                    inline-flex
                    items-center
                    gap-1.5
                    text-xs
                    font-semibold
                    text-terracotta-400
                    transition
                    hover:text-terracotta-300
                "
            >

                Kelola Kategori

                <i
                    data-lucide="arrow-up-right"
                    class="h-3.5 w-3.5"
                ></i>

            </a>

        </div>


        {{-- USERS --}}

        <div class="stat-card">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-wood-500">
                        Users
                    </p>

                    <h2 class="mt-3 font-serif text-4xl font-bold text-wood-100">
                        {{ $totalUsers }}
                    </h2>

                    <p class="mt-2 text-xs text-wood-500">
                        Pengguna terdaftar
                    </p>

                </div>


                <div
                    class="
                        flex
                        h-11
                        w-11
                        items-center
                        justify-center
                        rounded-xl
                        border
                        border-wood-600
                        bg-wood-800
                        text-terracotta-400
                    "
                >

                    <i
                        data-lucide="users"
                        class="h-5 w-5"
                    ></i>

                </div>

            </div>


            <a
                href="{{ route('admin.users') }}"
                class="
                    mt-5
                    inline-flex
                    items-center
                    gap-1.5
                    text-xs
                    font-semibold
                    text-terracotta-400
                    transition
                    hover:text-terracotta-300
                "
            >

                Lihat Users

                <i
                    data-lucide="arrow-up-right"
                    class="h-3.5 w-3.5"
                ></i>

            </a>

        </div>


        {{-- PESANAN --}}

        <div class="stat-card">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-wood-500">
                        Pesanan
                    </p>

                    <h2 class="mt-3 font-serif text-4xl font-bold text-wood-100">
                        {{ $totalOrders }}
                    </h2>

                    <p class="mt-2 text-xs text-wood-500">
                        Total pesanan
                    </p>

                </div>


                <div
                    class="
                        flex
                        h-11
                        w-11
                        items-center
                        justify-center
                        rounded-xl
                        border
                        border-wood-600
                        bg-wood-800
                        text-terracotta-400
                    "
                >

                    <i
                        data-lucide="shopping-bag"
                        class="h-5 w-5"
                    ></i>

                </div>

            </div>


            <a
                href="{{ route('admin.orders') }}"
                class="
                    mt-5
                    inline-flex
                    items-center
                    gap-1.5
                    text-xs
                    font-semibold
                    text-terracotta-400
                    transition
                    hover:text-terracotta-300
                "
            >

                Kelola Pesanan

                <i
                    data-lucide="arrow-up-right"
                    class="h-3.5 w-3.5"
                ></i>

            </a>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SECONDARY CONTENT --}}
    {{-- ========================================================= --}}

    <div class="grid gap-6 lg:grid-cols-3">


        {{-- PESAN --}}

        <div class="admin-card rounded-2xl p-6 lg:col-span-2">

            <div class="flex items-start justify-between gap-4">

                <div>

                    <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-terracotta-400">
                        Communication
                    </p>

                    <h2 class="mt-2 font-serif text-2xl text-wood-100">
                        Pesan Pengguna
                    </h2>

                    <p class="mt-1 text-sm text-wood-500">
                        Pesan yang dikirim melalui halaman Contact.
                    </p>

                </div>


                <div
                    class="
                        flex
                        h-11
                        w-11
                        shrink-0
                        items-center
                        justify-center
                        rounded-xl
                        border
                        border-wood-600
                        bg-wood-800
                        text-terracotta-400
                    "
                >

                    <i
                        data-lucide="mail"
                        class="h-5 w-5"
                    ></i>

                </div>

            </div>


            <div
                class="
                    mt-6
                    flex
                    items-center
                    justify-between
                    rounded-xl
                    border
                    border-wood-700/60
                    bg-wood-850/70
                    p-4
                "
            >

                <div>

                    <p class="text-sm font-medium text-wood-200">
                        {{ $totalMessages }} pesan
                    </p>

                    <p class="mt-1 text-xs text-wood-500">
                        Lihat pesan dari pengguna BookStore.
                    </p>

                </div>


                <a
                    href="{{ route('admin.messages') }}"
                    class="admin-secondary"
                >

                    Buka Pesan

                    <i
                        data-lucide="arrow-right"
                        class="h-4 w-4"
                    ></i>

                </a>

            </div>

        </div>


        {{-- QUICK ACTION --}}

        <div class="admin-card rounded-2xl p-6">

            <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-terracotta-400">
                Quick Actions
            </p>

            <h2 class="mt-2 font-serif text-2xl text-wood-100">
                Aksi Cepat
            </h2>

            <p class="mt-1 text-sm text-wood-500">
                Kelola data BookStore dengan cepat.
            </p>


            <div class="mt-6 space-y-3">


                <a
                    href="{{ route('books.create') }}"
                    class="
                        flex
                        items-center
                        justify-between
                        rounded-xl
                        border
                        border-wood-700
                        bg-wood-850
                        px-4
                        py-3
                        transition
                        hover:border-terracotta-400/40
                        hover:bg-wood-800
                    "
                >

                    <span class="flex items-center gap-3">

                        <span
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-lg
                                bg-terracotta-500/10
                                text-terracotta-400
                            "
                        >

                            <i
                                data-lucide="plus"
                                class="h-4 w-4"
                            ></i>

                        </span>

                        <span class="text-sm text-wood-200">
                            Tambah Buku
                        </span>

                    </span>


                    <i
                        data-lucide="chevron-right"
                        class="h-4 w-4 text-wood-600"
                    ></i>

                </a>


                <a
                    href="{{ route('categories.create') }}"
                    class="
                        flex
                        items-center
                        justify-between
                        rounded-xl
                        border
                        border-wood-700
                        bg-wood-850
                        px-4
                        py-3
                        transition
                        hover:border-terracotta-400/40
                        hover:bg-wood-800
                    "
                >

                    <span class="flex items-center gap-3">

                        <span
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-lg
                                bg-terracotta-500/10
                                text-terracotta-400
                            "
                        >

                            <i
                                data-lucide="tag"
                                class="h-4 w-4"
                            ></i>

                        </span>

                        <span class="text-sm text-wood-200">
                            Tambah Kategori
                        </span>

                    </span>


                    <i
                        data-lucide="chevron-right"
                        class="h-4 w-4 text-wood-600"
                    ></i>

                </a>


                <a
                    href="{{ route('admin.orders') }}"
                    class="
                        flex
                        items-center
                        justify-between
                        rounded-xl
                        border
                        border-wood-700
                        bg-wood-850
                        px-4
                        py-3
                        transition
                        hover:border-terracotta-400/40
                        hover:bg-wood-800
                    "
                >

                    <span class="flex items-center gap-3">

                        <span
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-lg
                                bg-terracotta-500/10
                                text-terracotta-400
                            "
                        >

                            <i
                                data-lucide="shopping-bag"
                                class="h-4 w-4"
                            ></i>

                        </span>

                        <span class="text-sm text-wood-200">
                            Kelola Pesanan
                        </span>

                    </span>


                    <i
                        data-lucide="chevron-right"
                        class="h-4 w-4 text-wood-600"
                    ></i>

                </a>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- INFORMATION CARD --}}
    {{-- ========================================================= --}}

    <div
        class="
            relative
            overflow-hidden
            rounded-2xl
            border
            border-wood-700/60
            bg-gradient-to-br
            from-wood-800
            to-wood-900
            p-6
            md:p-8
        "
    >

        <div
            class="
                absolute
                -right-16
                -top-16
                h-48
                w-48
                rounded-full
                bg-terracotta-500/5
                blur-3xl
            "
        ></div>


        <div class="relative flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

            <div>

                <div class="flex items-center gap-3">

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
                            text-amberlight
                        "
                    >

                        <i
                            data-lucide="book-open"
                            class="h-5 w-5"
                        ></i>

                    </div>


                    <div>

                        <p class="font-serif text-xl text-wood-100">
                            BookStore Admin
                        </p>

                        <p class="text-xs text-wood-500">
                            Ruang pengelolaan toko buku
                        </p>

                    </div>

                </div>


                <p class="mt-4 max-w-2xl text-sm leading-6 text-wood-400">

                    Gunakan panel ini untuk mengelola koleksi buku,
                    kategori, pengguna, pesan, dan pesanan yang
                    masuk ke BookStore.

                </p>

            </div>


            <a
                href="{{ route('home') }}"
                class="admin-primary shrink-0"
            >

                <i
                    data-lucide="store"
                    class="h-4 w-4"
                ></i>

                Buka BookStore

            </a>

        </div>

    </div>

</div>

@endsection