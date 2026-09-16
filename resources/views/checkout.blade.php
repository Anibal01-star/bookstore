@extends('layouts.app')

@section('title', 'Checkout - BookStore')

@section('content')

<div class="relative overflow-hidden">

    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>

    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Header --}}
        <div class="mb-8">

            <a
                href="{{ route('cart') }}"
                class="mb-5 inline-flex items-center gap-2 text-sm text-wood-400 transition hover:text-wood-100"
            >
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                Kembali ke Keranjang
            </a>

            <div>

                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                    Final Step
                </p>

                <h1 class="mt-1 font-serif text-4xl text-wood-100 md:text-5xl">
                    Checkout
                </h1>

                <p class="mt-2 text-sm text-wood-400">
                    Periksa pesanan kamu sebelum melakukan order.
                </p>

            </div>

        </div>


        <div class="grid gap-6 lg:grid-cols-[1fr_360px]">


            {{-- ORDER ITEMS --}}
            <section>

                <div class="mb-4 flex items-center gap-2">

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-terracotta-500/10 text-terracotta-400">

                        <i
                            data-lucide="shopping-bag"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <div>

                        <h2 class="font-serif text-xl text-wood-100">
                            Buku yang Dipesan
                        </h2>

                        <p class="text-xs text-wood-500">
                            {{ $cart->items->sum('quantity') }} item dalam pesanan
                        </p>

                    </div>

                </div>


                <div class="space-y-4">

                    @foreach($cart->items as $item)

                        @php
                            $subtotal = $item->book->price * $item->quantity;
                        @endphp


                        <article class="rounded-2xl border border-wood-700 bg-wood-900/80 p-4 shadow-shelf-back">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">


                                {{-- COVER --}}
                                <div class="shrink-0">

                                    @if($item->book->cover)

                                        <img
                                            src="{{ asset('storage/' . $item->book->cover) }}"
                                            alt="{{ $item->book->title }}"
                                            class="h-32 w-22 rounded-r-lg rounded-l-md object-cover shadow-book-3d"
                                        >

                                    @else

                                        <div class="flex h-32 w-22 items-center justify-center rounded-r-lg rounded-l-md bg-wood-800 text-wood-400 shadow-book-3d">

                                            <i
                                                data-lucide="book-open"
                                                class="h-8 w-8"
                                            ></i>

                                        </div>

                                    @endif

                                </div>


                                {{-- INFO --}}
                                <div class="min-w-0 flex-1">

                                    <div class="flex flex-wrap items-start justify-between gap-3">

                                        <div>

                                            <h3 class="font-serif text-xl leading-6 text-wood-100">
                                                {{ $item->book->title }}
                                            </h3>

                                            <p class="mt-1 text-sm text-wood-400">
                                                {{ $item->book->author }}
                                            </p>

                                        </div>

                                        <span class="rounded-full border border-wood-600 bg-wood-850 px-3 py-1 text-xs text-wood-300">
                                            {{ $item->quantity }} buku
                                        </span>

                                    </div>


                                    <div class="mt-5 grid grid-cols-2 gap-4 sm:grid-cols-3">

                                        <div>

                                            <p class="text-xs text-wood-500">
                                                Harga / buku
                                            </p>

                                            <p class="mt-1 text-sm font-medium text-wood-200">
                                                Rp {{ number_format($item->book->price, 0, ',', '.') }}
                                            </p>

                                        </div>


                                        <div>

                                            <p class="text-xs text-wood-500">
                                                Jumlah
                                            </p>

                                            <p class="mt-1 text-sm font-medium text-wood-200">
                                                {{ $item->quantity }}
                                            </p>

                                        </div>


                                        <div>

                                            <p class="text-xs text-wood-500">
                                                Subtotal
                                            </p>

                                            <p class="mt-1 text-sm font-semibold text-terracotta-400">
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


            {{-- SUMMARY --}}
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
                                    Pastikan semuanya sudah benar
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Summary --}}
                    <div class="p-6">

                        <div class="flex items-center justify-between">

                            <span class="text-sm text-wood-400">
                                Total Item
                            </span>

                            <span class="font-medium text-wood-100">
                                {{ $cart->items->sum('quantity') }}
                            </span>

                        </div>


                        <div class="mt-3 flex items-center justify-between">

                            <span class="text-sm text-wood-400">
                                Jenis Buku
                            </span>

                            <span class="font-medium text-wood-100">
                                {{ $cart->items->count() }}
                            </span>

                        </div>


                        <div class="my-6 h-px bg-wood-700"></div>


                        <div>

                            <p class="text-sm text-wood-400">
                                Total Pembayaran
                            </p>

                            <p class="mt-1 text-3xl font-semibold text-terracotta-400">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </p>

                        </div>


                        {{-- Confirmation --}}
                        <div class="mt-6 rounded-xl border border-wood-700 bg-wood-850 p-4">

                            <div class="flex gap-3">

                                <i
                                    data-lucide="shield-check"
                                    class="mt-0.5 h-5 w-5 shrink-0 text-green-400"
                                ></i>

                                <p class="text-xs leading-5 text-wood-400">
                                    Periksa kembali buku, jumlah, dan total pembayaran sebelum membuat pesanan.
                                </p>

                            </div>

                        </div>


                        {{-- Create Order --}}
                        <form
                            action="{{ route('checkout.store') }}"
                            method="POST"
                            class="mt-6"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="btn-terracotta inline-flex w-full items-center justify-center gap-2 rounded-xl px-5 py-3.5 font-semibold"
                            >

                                <i
                                    data-lucide="shopping-bag"
                                    class="h-5 w-5"
                                ></i>

                                Buat Pesanan

                            </button>

                        </form>


                        {{-- Back --}}
                        <a
                            href="{{ route('cart') }}"
                            class="mt-3 inline-flex w-full items-center justify-center gap-2 rounded-xl border border-wood-700 bg-wood-850 px-5 py-3 text-sm font-medium text-wood-200 transition hover:bg-wood-800"
                        >

                            <i
                                data-lucide="arrow-left"
                                class="h-4 w-4"
                            ></i>

                            Kembali ke Keranjang

                        </a>

                    </div>

                </div>

            </aside>

        </div>

    </main>

</div>

@endsection