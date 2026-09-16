@extends('layouts.app')

@section('title', 'Keranjang - BookStore')

@section('content')

<div class="relative overflow-hidden">

    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>

    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Header --}}
        <div class="mb-8">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                        Your Selection
                    </p>

                    <h1 class="mt-1 font-serif text-4xl text-wood-100 md:text-5xl">
                        Keranjang Belanja
                    </h1>

                    <p class="mt-2 text-sm text-wood-400">
                        Periksa kembali buku yang ingin kamu pesan.
                    </p>

                </div>

                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 self-start rounded-xl border border-wood-700 bg-wood-900 px-5 py-3 text-sm font-medium text-wood-200 transition hover:bg-wood-800 sm:self-auto"
                >
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Kembali Belanja
                </a>

            </div>

        </div>

<!-- 
        {{-- Flash Messages --}}
        @if(session('success'))

            <div class="alert-message mb-6 rounded-2xl border border-green-500/20 bg-green-900/30 px-5 py-4 text-green-200">

                <div class="flex items-center gap-3">

                    <i data-lucide="circle-check" class="h-5 w-5"></i>

                    <span>{{ session('success') }}</span>

                </div>

            </div>

        @endif -->


        @if(session('error'))

            <div class="alert-message mb-6 rounded-2xl border border-red-500/20 bg-red-900/30 px-5 py-4 text-red-200">

                <div class="flex items-center gap-3">

                    <i data-lucide="circle-alert" class="h-5 w-5"></i>

                    <span>{{ session('error') }}</span>

                </div>

            </div>

        @endif


        @if($cart->items->count() > 0)

            @php
                $total = 0;
            @endphp


            <div class="grid gap-6 lg:grid-cols-[1fr_360px]">


                {{-- CART ITEMS --}}
                <section>

                    <div class="mb-4 flex items-center justify-between">

                        <div class="flex items-center gap-2 text-wood-300">

                            <i data-lucide="shopping-bag" class="h-5 w-5 text-terracotta-400"></i>

                            <span class="font-medium">
                                {{ $cart->items->count() }} jenis buku
                            </span>

                        </div>

                        <span class="text-sm text-wood-500">
                            {{ $cart->items->sum('quantity') }} item
                        </span>

                    </div>


                    <div class="space-y-4">

                        @foreach($cart->items as $item)

                            @php
                                $subtotal = $item->book->price * $item->quantity;
                                $total += $subtotal;
                            @endphp


                            <article class="group rounded-2xl border border-wood-700 bg-wood-900/80 p-4 shadow-shelf-back transition hover:border-wood-600">

                                <div class="flex flex-col gap-5 sm:flex-row">


                                    {{-- COVER --}}
                                    <div class="shrink-0">

                                        @if($item->book->cover)

                                            <img
                                                src="{{ asset('storage/' . $item->book->cover) }}"
                                                alt="{{ $item->book->title }}"
                                                class="h-36 w-24 rounded-r-lg rounded-l-md object-cover shadow-book-3d"
                                            >

                                        @else

                                            <div class="flex h-36 w-24 items-center justify-center rounded-r-lg rounded-l-md bg-wood-800 text-wood-400 shadow-book-3d">

                                                <i
                                                    data-lucide="book-open"
                                                    class="h-9 w-9"
                                                ></i>

                                            </div>

                                        @endif

                                    </div>


                                    {{-- BOOK INFO --}}
                                    <div class="min-w-0 flex-1">

                                        <div class="flex flex-col gap-2 sm:flex-row sm:justify-between">

                                            <div class="min-w-0">

                                                <h2 class="font-serif text-xl leading-6 text-wood-100">

                                                    {{ $item->book->title }}

                                                </h2>

                                                <p class="mt-1 text-sm text-wood-400">

                                                    {{ $item->book->author }}

                                                </p>

                                            </div>


                                            {{-- Remove --}}
                                            <form
                                                action="{{ route('cart.remove', $item) }}"
                                                method="POST"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    title="Hapus dari keranjang"
                                                    class="inline-flex items-center gap-2 rounded-lg border border-red-500/20 bg-red-500/5 px-3 py-2 text-xs font-medium text-red-400 transition hover:bg-red-500/10"
                                                >

                                                    <i
                                                        data-lucide="trash-2"
                                                        class="h-4 w-4"
                                                    ></i>

                                                    Hapus

                                                </button>

                                            </form>

                                        </div>


                                        {{-- Price --}}
                                        <div class="mt-4">

                                            <p class="text-xs text-wood-500">
                                                Harga per buku
                                            </p>

                                            <p class="font-medium text-terracotta-400">

                                                Rp {{ number_format($item->book->price, 0, ',', '.') }}

                                            </p>

                                        </div>


                                        {{-- Bottom --}}
                                        <div class="mt-5 flex flex-col gap-4 border-t border-wood-700 pt-4 sm:flex-row sm:items-end sm:justify-between">


                                            {{-- Quantity --}}
                                            <form
                                                action="{{ route('cart.update', $item) }}"
                                                method="POST"
                                            >

                                                @csrf
                                                @method('PUT')

                                                <label
                                                    class="mb-2 block text-xs font-medium text-wood-400"
                                                >
                                                    Jumlah
                                                </label>

                                                <div class="flex">

                                                    <input
                                                        type="number"
                                                        name="quantity"
                                                        value="{{ $item->quantity }}"
                                                        min="1"
                                                        max="{{ $item->book->stock }}"
                                                        class="bookstore-input w-20 rounded-l-xl px-3 py-2.5 text-center"
                                                    >

                                                    <button
                                                        type="submit"
                                                        class="rounded-r-xl border border-l-0 border-wood-600 bg-wood-700 px-4 py-2.5 text-sm font-medium text-wood-200 transition hover:bg-wood-600"
                                                    >
                                                        Update
                                                    </button>

                                                </div>

                                            </form>


                                            {{-- Subtotal --}}
                                            <div class="sm:text-right">

                                                <p class="text-xs text-wood-500">
                                                    Subtotal
                                                </p>

                                                <p class="mt-1 text-lg font-semibold text-wood-100">

                                                    Rp {{ number_format($subtotal, 0, ',', '.') }}

                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </article>

                        @endforeach

                    </div>

                </section>


                {{-- ORDER SUMMARY --}}
                <aside>

                    <div class="sticky top-24 overflow-hidden rounded-2xl border border-wood-700 bg-wood-900 shadow-shelf-back">

                        {{-- Header --}}
                        <div class="border-b border-wood-700 bg-wood-850 px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-terracotta-500/10 text-terracotta-400">

                                    <i
                                        data-lucide="receipt"
                                        class="h-5 w-5"
                                    ></i>

                                </div>

                                <div>

                                    <h2 class="font-serif text-xl text-wood-100">
                                        Ringkasan Pesanan
                                    </h2>

                                    <p class="text-xs text-wood-500">
                                        Detail pembelianmu
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Summary Body --}}
                        <div class="p-6">

                            <div class="flex items-center justify-between">

                                <span class="text-sm text-wood-400">
                                    Total Item
                                </span>

                                <span class="font-medium text-wood-100">
                                    {{ $cart->items->sum('quantity') }}
                                </span>

                            </div>


                            <div class="my-5 h-px bg-wood-700"></div>


                            <div class="flex items-end justify-between gap-4">

                                <div>

                                    <p class="text-sm text-wood-400">
                                        Total Pembayaran
                                    </p>

                                    <p class="mt-1 text-2xl font-semibold text-terracotta-400">

                                        Rp {{ number_format($total, 0, ',', '.') }}

                                    </p>

                                </div>

                            </div>


                            {{-- Checkout --}}
                            <a
                                href="{{ route('checkout') }}"
                                class="btn-terracotta mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl px-5 py-3.5 font-semibold"
                            >

                                <i
                                    data-lucide="credit-card"
                                    class="h-5 w-5"
                                ></i>

                                Checkout / Order

                            </a>


                            <p class="mt-3 text-center text-xs leading-5 text-wood-500">

                                Periksa kembali jumlah dan buku sebelum melakukan checkout.

                            </p>


                            {{-- Continue Shopping --}}
                            <a
                                href="{{ route('home') }}"
                                class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-xl border border-wood-700 bg-wood-850 px-5 py-3 text-sm font-medium text-wood-200 transition hover:bg-wood-800"
                            >

                                <i
                                    data-lucide="book-open"
                                    class="h-4 w-4"
                                ></i>

                                Lanjut Belanja

                            </a>

                        </div>

                    </div>

                </aside>

            </div>


        @else

            {{-- EMPTY CART --}}
            <section class="rounded-[2rem] border border-wood-700 bg-wood-900/80 px-6 py-20 text-center shadow-shelf-back">

                <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-wood-800 text-wood-300">

                    <i
                        data-lucide="shopping-cart"
                        class="h-12 w-12"
                    ></i>

                </div>

                <h2 class="mt-7 font-serif text-3xl text-wood-100">
                    Keranjang Masih Kosong
                </h2>

                <p class="mx-auto mt-3 max-w-md text-sm leading-6 text-wood-400">

                    Belum ada buku yang kamu tambahkan ke keranjang.
                    Yuk, cari bacaan yang menarik untuk menemani harimu.

                </p>

                <a
                    href="{{ route('home') }}"
                    class="btn-terracotta mt-7 inline-flex items-center gap-2 rounded-xl px-6 py-3 font-semibold"
                >

                    <i
                        data-lucide="book-open"
                        class="h-5 w-5"
                    ></i>

                    Mulai Belanja

                </a>

            </section>

        @endif

    </main>

</div>

@endsection