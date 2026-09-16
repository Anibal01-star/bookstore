@extends('layouts.app')

@section('title', 'Detail Pesanan - BookStore')

@section('content')

<div class="relative overflow-hidden">

    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>

    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- BACK --}}
        <a
            href="{{ route('orders.index') }}"
            class="mb-5 inline-flex items-center gap-2 text-sm text-wood-400 transition hover:text-wood-100"
        >
            <i data-lucide="arrow-left" class="h-4 w-4"></i>
            Kembali ke Pesanan Saya
        </a>


        <!-- {{-- SUCCESS --}}
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


        {{-- PAGE HEADER --}}
        <div class="mb-8">

            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                Order Details
            </p>

            <h1 class="mt-1 font-serif text-4xl text-wood-100 md:text-5xl">
                Detail Pesanan
            </h1>

            <p class="mt-2 text-sm text-wood-400">
                Informasi lengkap mengenai pesanan kamu.
            </p>

        </div>


        {{-- ORDER INFORMATION --}}
        <section class="mb-6 overflow-hidden rounded-2xl border border-wood-700 bg-wood-900/85 shadow-shelf-back">

            <div class="border-b border-wood-700 bg-wood-850 px-5 py-5 sm:px-6">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <p class="text-xs uppercase tracking-wider text-wood-500">
                            Nomor Pesanan
                        </p>

                        <h2 class="mt-1 font-serif text-3xl text-wood-100">
                            #{{ $order->id }}
                        </h2>

                    </div>


                    {{-- STATUS --}}
                    <div>

                        @if($order->status === 'pending')

                            <span class="inline-flex items-center gap-2 rounded-full border border-yellow-700/50 bg-yellow-950/40 px-4 py-2 text-xs font-medium text-yellow-300">

                                <i
                                    data-lucide="clock-3"
                                    class="h-4 w-4"
                                ></i>

                                Menunggu Konfirmasi

                            </span>

                        @elseif($order->status === 'processing')

                            <span class="inline-flex items-center gap-2 rounded-full border border-blue-700/50 bg-blue-950/40 px-4 py-2 text-xs font-medium text-blue-300">

                                <i
                                    data-lucide="truck"
                                    class="h-4 w-4"
                                ></i>

                                Sedang Diproses

                            </span>

                        @elseif($order->status === 'completed')

                            <span class="inline-flex items-center gap-2 rounded-full border border-green-700/50 bg-green-950/40 px-4 py-2 text-xs font-medium text-green-300">

                                <i
                                    data-lucide="circle-check"
                                    class="h-4 w-4"
                                ></i>

                                Pesanan Selesai

                            </span>

                        @elseif($order->status === 'cancelled')

                            <span class="inline-flex items-center gap-2 rounded-full border border-red-700/50 bg-red-950/40 px-4 py-2 text-xs font-medium text-red-300">

                                <i
                                    data-lucide="circle-x"
                                    class="h-4 w-4"
                                ></i>

                                Pesanan Dibatalkan

                            </span>

                        @endif

                    </div>

                </div>

            </div>


            <div class="grid gap-5 px-5 py-5 sm:grid-cols-2 sm:px-6">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-wood-850 text-wood-400">

                        <i
                            data-lucide="calendar"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <div>

                        <p class="text-xs text-wood-500">
                            Dibuat pada
                        </p>

                        <p class="mt-1 text-sm font-medium text-wood-200">
                            {{ $order->created_at->format('d M Y, H:i') }}
                        </p>

                    </div>

                </div>


                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-wood-850 text-wood-400">

                        <i
                            data-lucide="book-open"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <div>

                        <p class="text-xs text-wood-500">
                            Total Buku
                        </p>

                        <p class="mt-1 text-sm font-medium text-wood-200">
                            {{ $order->items->sum('quantity') }} buku
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- BOOKS --}}
        <section class="overflow-hidden rounded-2xl border border-wood-700 bg-wood-900/85 shadow-shelf-back">

            <div class="border-b border-wood-700 bg-wood-850 px-5 py-5 sm:px-6">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-terracotta-500/10 text-terracotta-400">

                        <i
                            data-lucide="library"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <div>

                        <h2 class="font-serif text-2xl text-wood-100">
                            Buku yang Dipesan
                        </h2>

                        <p class="text-xs text-wood-500">
                            {{ $order->items->count() }} jenis buku
                        </p>

                    </div>

                </div>

            </div>


            <div class="divide-y divide-wood-700">

                @foreach($order->items as $item)

                    <div class="p-5 sm:p-6">

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


                            {{-- BOOK INFO --}}
                            <div class="min-w-0 flex-1">

                                <h3 class="font-serif text-xl text-wood-100">
                                    {{ $item->book->title }}
                                </h3>

                                <p class="mt-1 text-sm text-wood-400">
                                    {{ $item->book->author }}
                                </p>


                                <div class="mt-5 grid grid-cols-2 gap-4 sm:grid-cols-3">

                                    <div>

                                        <p class="text-xs text-wood-500">
                                            Harga
                                        </p>

                                        <p class="mt-1 text-sm text-wood-200">
                                            Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </p>

                                    </div>


                                    <div>

                                        <p class="text-xs text-wood-500">
                                            Quantity
                                        </p>

                                        <p class="mt-1 text-sm text-wood-200">
                                            {{ $item->quantity }}
                                        </p>

                                    </div>


                                    <div>

                                        <p class="text-xs text-wood-500">
                                            Subtotal
                                        </p>

                                        <p class="mt-1 text-sm font-semibold text-terracotta-400">
                                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- TOTAL --}}
            <div class="border-t border-wood-700 bg-wood-850 px-5 py-6 sm:px-6">

                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <p class="text-sm text-wood-400">
                            Total Pesanan
                        </p>

                        <p class="text-xs text-wood-500">
                            Termasuk seluruh buku dalam pesanan
                        </p>

                    </div>


                    <p class="font-serif text-3xl font-semibold text-terracotta-400">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </p>

                </div>

            </div>

        </section>


        {{-- BACK BUTTON --}}
        <div class="mt-6">

            <a
                href="{{ route('orders.index') }}"
                class="inline-flex items-center gap-2 rounded-xl border border-wood-700 bg-wood-900 px-5 py-3 text-sm font-medium text-wood-200 transition hover:border-wood-600 hover:bg-wood-800"
            >

                <i
                    data-lucide="arrow-left"
                    class="h-4 w-4"
                ></i>

                Kembali ke Pesanan Saya

            </a>

        </div>

    </main>

</div>

@endsection