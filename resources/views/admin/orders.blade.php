@extends('layouts.admin')

@section('title', 'Pesanan - Admin BookStore')

@section('page-heading', 'Pesanan')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}

    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">

        <div>

            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                Management
            </p>

            <h1 class="mt-2 font-serif text-3xl font-bold text-wood-100">
                Pesanan
            </h1>

            <p class="mt-2 text-sm text-wood-400">
                Kelola dan perbarui status pesanan pelanggan.
            </p>

        </div>


        <div
            class="
                flex
                items-center
                gap-2
                rounded-xl
                border
                border-wood-700
                bg-wood-850
                px-4
                py-3
                text-sm
                text-wood-400
            "
        >

            <i
                data-lucide="shopping-bag"
                class="h-4 w-4 text-terracotta-400"
            ></i>

            <span>
                {{ $orders->count() }} Pesanan
            </span>

        </div>

    </div>


    {{-- ORDER LIST --}}

    @if($orders->isEmpty())

        <div class="admin-card rounded-2xl">

            <div class="px-6 py-16 text-center">

                <div
                    class="
                        mx-auto
                        flex
                        h-16
                        w-16
                        items-center
                        justify-center
                        rounded-2xl
                        border
                        border-wood-700
                        bg-wood-850
                        text-wood-500
                    "
                >

                    <i
                        data-lucide="shopping-bag"
                        class="h-7 w-7"
                    ></i>

                </div>


                <h3 class="mt-4 font-serif text-xl text-wood-200">
                    Belum ada pesanan
                </h3>


                <p class="mx-auto mt-2 max-w-md text-sm text-wood-500">
                    Pesanan dari user akan muncul di halaman ini
                    setelah mereka melakukan checkout.
                </p>

            </div>

        </div>

    @else

        <div class="space-y-5">

            @foreach($orders as $order)

                <div class="admin-card overflow-hidden rounded-2xl">


                    {{-- ORDER HEADER --}}

                    <div
                        class="
                            flex
                            flex-col
                            gap-4
                            border-b
                            border-wood-700/50
                            px-5
                            py-5
                            md:flex-row
                            md:items-center
                            md:justify-between
                        "
                    >

                        <div class="flex items-center gap-3">

                            <div
                                class="
                                    flex
                                    h-11
                                    w-11
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-xl
                                    bg-terracotta-500/10
                                    text-terracotta-400
                                "
                            >

                                <i
                                    data-lucide="receipt"
                                    class="h-5 w-5"
                                ></i>

                            </div>


                            <div>

                                <h2 class="font-serif text-lg text-wood-100">
                                    Pesanan #{{ $order->id }}
                                </h2>

                                <div class="mt-1 flex items-center gap-2 text-xs text-wood-500">

                                    <i
                                        data-lucide="calendar-days"
                                        class="h-3.5 w-3.5"
                                    ></i>

                                    {{ $order->created_at->format('d M Y, H:i') }}

                                </div>

                            </div>

                        </div>


                        {{-- STATUS --}}

                        <div>

                            @if($order->status === 'pending')

                                <span
                                    class="
                                        inline-flex
                                        items-center
                                        gap-2
                                        rounded-full
                                        border
                                        border-amber-500/20
                                        bg-amber-500/10
                                        px-3
                                        py-1.5
                                        text-xs
                                        font-semibold
                                        text-amber-300
                                    "
                                >

                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>

                                    Menunggu

                                </span>

                            @elseif($order->status === 'processing')

                                <span
                                    class="
                                        inline-flex
                                        items-center
                                        gap-2
                                        rounded-full
                                        border
                                        border-blue-500/20
                                        bg-blue-500/10
                                        px-3
                                        py-1.5
                                        text-xs
                                        font-semibold
                                        text-blue-300
                                    "
                                >

                                    <span class="h-1.5 w-1.5 rounded-full bg-blue-400"></span>

                                    Diproses

                                </span>

                            @elseif($order->status === 'completed')

                                <span
                                    class="
                                        inline-flex
                                        items-center
                                        gap-2
                                        rounded-full
                                        border
                                        border-green-500/20
                                        bg-green-500/10
                                        px-3
                                        py-1.5
                                        text-xs
                                        font-semibold
                                        text-green-300
                                    "
                                >

                                    <span class="h-1.5 w-1.5 rounded-full bg-green-400"></span>

                                    Selesai

                                </span>

                            @elseif($order->status === 'cancelled')

                                <span
                                    class="
                                        inline-flex
                                        items-center
                                        gap-2
                                        rounded-full
                                        border
                                        border-red-500/20
                                        bg-red-500/10
                                        px-3
                                        py-1.5
                                        text-xs
                                        font-semibold
                                        text-red-300
                                    "
                                >

                                    <span class="h-1.5 w-1.5 rounded-full bg-red-400"></span>

                                    Dibatalkan

                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- BUYER --}}

                    <div class="border-b border-wood-700/50 px-5 py-5">

                        <div class="mb-3 flex items-center gap-2">

                            <i
                                data-lucide="user"
                                class="h-4 w-4 text-terracotta-400"
                            ></i>

                            <h3 class="text-sm font-semibold text-wood-200">
                                Data Pembeli
                            </h3>

                        </div>


                        <div class="flex items-center gap-3">

                            <div
                                class="
                                    flex
                                    h-10
                                    w-10
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-full
                                    bg-wood-800
                                    text-sm
                                    font-semibold
                                    text-wood-300
                                "
                            >

                                {{ strtoupper(substr($order->user->name, 0, 1)) }}

                            </div>


                            <div>

                                <p class="text-sm font-medium text-wood-100">
                                    {{ $order->user->name }}
                                </p>

                                <p class="mt-0.5 text-xs text-wood-500">
                                    {{ $order->user->email }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- DETAIL BUKU --}}

                    <div class="px-5 py-5">

                        <div class="mb-4 flex items-center gap-2">

                            <i
                                data-lucide="book-open"
                                class="h-4 w-4 text-terracotta-400"
                            ></i>

                            <h3 class="text-sm font-semibold text-wood-200">
                                Detail Buku
                            </h3>

                        </div>


                        <div class="divide-y divide-wood-700/40">

                            @foreach($order->items as $item)

                                <div
                                    class="
                                        flex
                                        flex-col
                                        gap-4
                                        py-4
                                        first:pt-0
                                        last:pb-0
                                        sm:flex-row
                                        sm:items-center
                                    "
                                >

                                    {{-- COVER --}}

                                    @if($item->book->cover)

                                        <img
                                            src="{{ asset('storage/' . $item->book->cover) }}"
                                            alt="{{ $item->book->title }}"
                                            class="
                                                h-20
                                                w-14
                                                shrink-0
                                                rounded-lg
                                                border
                                                border-wood-700
                                                object-cover
                                                shadow-lg
                                            "
                                        >

                                    @else

                                        <div
                                            class="
                                                flex
                                                h-20
                                                w-14
                                                shrink-0
                                                items-center
                                                justify-center
                                                rounded-lg
                                                border
                                                border-wood-700
                                                bg-wood-850
                                                text-wood-500
                                            "
                                        >

                                            <i
                                                data-lucide="book"
                                                class="h-5 w-5"
                                            ></i>

                                        </div>

                                    @endif


                                    {{-- BOOK INFO --}}

                                    <div class="min-w-0 flex-1">

                                        <p
                                            class="
                                                truncate
                                                text-sm
                                                font-semibold
                                                text-wood-100
                                            "
                                        >
                                            {{ $item->book->title }}
                                        </p>


                                        <p class="mt-1 text-xs text-wood-500">

                                            {{ $item->quantity }}
                                            ×
                                            Rp {{ number_format($item->price, 0, ',', '.') }}

                                        </p>

                                    </div>


                                    {{-- SUBTOTAL --}}

                                    <div class="sm:text-right">

                                        <p class="text-xs text-wood-500">
                                            Subtotal
                                        </p>

                                        <p class="mt-1 text-sm font-semibold text-wood-200">

                                            Rp
                                            {{ number_format($item->subtotal, 0, ',', '.') }}

                                        </p>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>


                    {{-- FOOTER / TOTAL + STATUS --}}

                    <div
                        class="
                            flex
                            flex-col
                            gap-5
                            border-t
                            border-wood-700/50
                            bg-wood-950/30
                            px-5
                            py-5
                            lg:flex-row
                            lg:items-center
                            lg:justify-between
                        "
                    >

                        {{-- TOTAL --}}

                        <div>

                            <p class="text-xs uppercase tracking-wider text-wood-500">
                                Total Pesanan
                            </p>

                            <p
                                class="
                                    mt-1
                                    font-serif
                                    text-2xl
                                    font-bold
                                    text-terracotta-400
                                "
                            >

                                Rp
                                {{ number_format($order->total_price, 0, ',', '.') }}

                            </p>

                        </div>


                        {{-- UPDATE STATUS --}}

                        <form
                            action="{{ route('admin.orders.status', $order) }}"
                            method="POST"
                            class="
                                flex
                                flex-col
                                gap-2
                                sm:flex-row
                                sm:items-center
                            "
                        >

                            @csrf

                            @method('PUT')


                            <label
                                for="status-{{ $order->id }}"
                                class="text-xs font-medium text-wood-500"
                            >
                                Ubah Status
                            </label>


                            <select
                                id="status-{{ $order->id }}"
                                name="status"
                                class="admin-input min-w-[180px]"
                            >

                                <option
                                    value="pending"
                                    {{ $order->status === 'pending' ? 'selected' : '' }}
                                >
                                    Menunggu
                                </option>

                                <option
                                    value="processing"
                                    {{ $order->status === 'processing' ? 'selected' : '' }}
                                >
                                    Diproses
                                </option>

                                <option
                                    value="completed"
                                    {{ $order->status === 'completed' ? 'selected' : '' }}
                                >
                                    Selesai
                                </option>

                                <option
                                    value="cancelled"
                                    {{ $order->status === 'cancelled' ? 'selected' : '' }}
                                >
                                    Dibatalkan
                                </option>

                            </select>


                            <button
                                type="submit"
                                class="admin-primary whitespace-nowrap"
                            >

                                <i
                                    data-lucide="save"
                                    class="h-4 w-4"
                                ></i>

                                Update Status

                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection