@extends('layouts.app')

@section('title', 'Pesanan Saya - BookStore')

@section('content')

<div class="relative overflow-hidden">

    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>

    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">


        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('home') }}"
                class="mb-5 inline-flex items-center gap-2 text-sm text-wood-400 transition hover:text-wood-100"
            >
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                Kembali ke Home
            </a>

            <div class="flex items-start gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-terracotta-500/10 text-terracotta-400">

                    <i
                        data-lucide="package"
                        class="h-6 w-6"
                    ></i>

                </div>

                <div>

                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                        Your Orders
                    </p>

                    <h1 class="mt-1 font-serif text-4xl text-wood-100 md:text-5xl">
                        Pesanan Saya
                    </h1>

                    <p class="mt-2 text-sm text-wood-400">
                        Riwayat pesanan buku kamu.
                    </p>

                </div>

            </div>

        </div>


        <!-- {{-- SUCCESS MESSAGE --}}
        @if(session('success'))

            <div class="alert-message mb-6 flex items-center gap-3 rounded-xl border border-green-700/50 bg-green-950/40 px-4 py-3 text-sm text-green-300">

                <i
                    data-lucide="circle-check"
                    class="h-5 w-5 shrink-0"
                ></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif -->


        {{-- ORDERS --}}
        @if($orders->count() > 0)

            <div class="space-y-5">

                @foreach($orders as $order)

                    <article class="overflow-hidden rounded-2xl border border-wood-700 bg-wood-900/85 shadow-shelf-back transition duration-300 hover:border-wood-600">


                        {{-- ORDER HEADER --}}
                        <div class="border-b border-wood-700 bg-wood-850 px-5 py-4 sm:px-6">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                                <div>

                                    <p class="text-xs uppercase tracking-wider text-wood-500">
                                        Nomor Pesanan
                                    </p>

                                    <div class="mt-1 flex items-center gap-2">

                                        <h2 class="font-serif text-2xl text-wood-100">
                                            #{{ $order->id }}
                                        </h2>

                                    </div>

                                    <div class="mt-1 flex items-center gap-2 text-xs text-wood-500">

                                        <i
                                            data-lucide="calendar"
                                            class="h-3.5 w-3.5"
                                        ></i>

                                        {{ $order->created_at->format('d M Y, H:i') }}

                                    </div>

                                </div>


                                {{-- STATUS --}}
                                <div>

                                    @if($order->status === 'pending')

                                        <span class="inline-flex items-center gap-2 rounded-full border border-yellow-700/50 bg-yellow-950/40 px-3 py-1.5 text-xs font-medium text-yellow-300">

                                            <i
                                                data-lucide="clock-3"
                                                class="h-3.5 w-3.5"
                                            ></i>

                                            Menunggu Konfirmasi

                                        </span>

                                    @elseif($order->status === 'processing')

                                        <span class="inline-flex items-center gap-2 rounded-full border border-blue-700/50 bg-blue-950/40 px-3 py-1.5 text-xs font-medium text-blue-300">

                                            <i
                                                data-lucide="truck"
                                                class="h-3.5 w-3.5"
                                            ></i>

                                            Sedang Diproses

                                        </span>

                                    @elseif($order->status === 'completed')

                                        <span class="inline-flex items-center gap-2 rounded-full border border-green-700/50 bg-green-950/40 px-3 py-1.5 text-xs font-medium text-green-300">

                                            <i
                                                data-lucide="circle-check"
                                                class="h-3.5 w-3.5"
                                            ></i>

                                            Pesanan Selesai

                                        </span>

                                    @elseif($order->status === 'cancelled')

                                        <span class="inline-flex items-center gap-2 rounded-full border border-red-700/50 bg-red-950/40 px-3 py-1.5 text-xs font-medium text-red-300">

                                            <i
                                                data-lucide="circle-x"
                                                class="h-3.5 w-3.5"
                                            ></i>

                                            Pesanan Dibatalkan

                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>


                        {{-- ORDER BODY --}}
                        <div class="p-5 sm:p-6">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">


                                {{-- TOTAL --}}
                                <div>

                                    <p class="text-xs text-wood-500">
                                        Total Pembayaran
                                    </p>

                                    <p class="mt-1 text-2xl font-semibold text-terracotta-400">
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </p>

                                </div>


                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('orders.show', $order) }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-wood-600 bg-wood-850 px-4 py-2.5 text-sm font-medium text-wood-200 transition hover:border-wood-500 hover:bg-wood-800 hover:text-wood-100"
                                >

                                    Lihat Detail

                                    <i
                                        data-lucide="arrow-right"
                                        class="h-4 w-4"
                                    ></i>

                                </a>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>


        @else

            {{-- EMPTY STATE --}}
            <div class="rounded-2xl border border-wood-700 bg-wood-900/85 px-6 py-16 text-center shadow-shelf-back">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-wood-850 text-wood-400">

                    <i
                        data-lucide="package-open"
                        class="h-10 w-10"
                    ></i>

                </div>

                <p class="mt-6 text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                    Your Shelf Is Empty
                </p>

                <h2 class="mt-2 font-serif text-3xl text-wood-100">
                    Belum Ada Pesanan
                </h2>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-wood-400">
                    Kamu belum memiliki riwayat pesanan.
                    Yuk, temukan buku yang ingin kamu simpan di rakmu.
                </p>

                <a
                    href="{{ route('home') }}"
                    class="btn-terracotta mt-6 inline-flex items-center gap-2 rounded-xl px-5 py-3 font-semibold"
                >

                    <i
                        data-lucide="book-open"
                        class="h-5 w-5"
                    ></i>

                    Mulai Belanja

                </a>

            </div>

        @endif

    </main>

</div>

@endsection