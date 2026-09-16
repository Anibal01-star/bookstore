@extends('layouts.admin')

@section('title', 'Pesan Contact Admin - BookStore')

@section('page-heading', 'Pesan Contact Admin')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}

    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">

        <div>

            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                Management
            </p>

            <h1 class="mt-2 font-serif text-3xl font-bold text-wood-100">
                Pesan Contact Admin
            </h1>

            <p class="mt-2 text-sm text-wood-400">
                Daftar pesan yang dikirim oleh pengguna BookStore.
            </p>

        </div>


        <a
            href="{{ route('admin.dashboard') }}"
            class="admin-secondary self-start md:self-auto"
        >

            <i
                data-lucide="arrow-left"
                class="h-4 w-4"
            ></i>

            Dashboard

        </a>

    </div>


    {{-- STAT --}}

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

        <div class="admin-card rounded-2xl p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-medium uppercase tracking-wider text-wood-500">
                        Total Pesan
                    </p>

                    <p class="mt-2 font-serif text-3xl font-bold text-wood-100">
                        {{ $messages->count() }}
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
                        bg-wood-850
                        text-terracotta-400
                    "
                >

                    <i
                        data-lucide="mail"
                        class="h-5 w-5"
                    ></i>

                </div>

            </div>

        </div>

    </div>


    {{-- TABLE CARD --}}

    <div class="admin-card overflow-hidden rounded-2xl">

        <div
            class="
                flex
                flex-col
                gap-3
                border-b
                border-wood-700/50
                px-5
                py-5
                md:flex-row
                md:items-center
                md:justify-between
            "
        >

            <div>

                <h2 class="font-serif text-xl text-wood-100">
                    Inbox Pesan
                </h2>

                <p class="mt-1 text-xs text-wood-500">
                    Pesan dari pengguna BookStore
                </p>

            </div>


            <div
                class="
                    flex
                    items-center
                    gap-2
                    rounded-lg
                    border
                    border-wood-700
                    bg-wood-850
                    px-3
                    py-2
                    text-xs
                    text-wood-400
                "
            >

                <i
                    data-lucide="inbox"
                    class="h-4 w-4"
                ></i>

                {{ $messages->count() }} pesan

            </div>

        </div>


        {{-- TABLE --}}

        <div class="overflow-x-auto">

            <table class="admin-table w-full">

                <thead>

                    <tr>

                        <th class="w-16">
                            No
                        </th>

                        <th>
                            Pengirim
                        </th>

                        <th>
                            Email
                        </th>

                        <th class="min-w-[320px]">
                            Pesan
                        </th>

                        <th>
                            Tanggal
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($messages as $message)

                        <tr>

                            {{-- NO --}}

                            <td>

                                <span
                                    class="
                                        inline-flex
                                        h-7
                                        w-7
                                        items-center
                                        justify-center
                                        rounded-lg
                                        bg-wood-850
                                        text-xs
                                        font-semibold
                                        text-wood-400
                                    "
                                >

                                    {{ $loop->iteration }}

                                </span>

                            </td>


                            {{-- NAMA --}}

                            <td>

                                <div class="flex items-center gap-3">

                                    <div
                                        class="
                                            flex
                                            h-9
                                            w-9
                                            shrink-0
                                            items-center
                                            justify-center
                                            rounded-full
                                            bg-terracotta-500/15
                                            text-sm
                                            font-semibold
                                            text-terracotta-400
                                        "
                                    >

                                        {{ strtoupper(substr($message->name, 0, 1)) }}

                                    </div>


                                    <div>

                                        <p class="font-medium text-wood-100">
                                            {{ $message->name }}
                                        </p>

                                        <p class="text-xs text-wood-500">
                                            Pengguna BookStore
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- EMAIL --}}

                            <td>

                                <a
                                    href="mailto:{{ $message->email }}"
                                    class="
                                        inline-flex
                                        items-center
                                        gap-2
                                        text-sm
                                        text-terracotta-400
                                        transition
                                        hover:text-terracotta-300
                                    "
                                >

                                    <i
                                        data-lucide="mail"
                                        class="h-3.5 w-3.5"
                                    ></i>

                                    {{ $message->email }}

                                </a>

                            </td>


                            {{-- PESAN --}}

                            <td>

                                <div class="max-w-xl">

                                    <p
                                        class="
                                            whitespace-pre-line
                                            text-sm
                                            leading-6
                                            text-wood-300
                                        "
                                    >
                                        {{ $message->message }}
                                    </p>

                                </div>

                            </td>


                            {{-- TANGGAL --}}

                            <td>

                                <div class="flex items-center gap-2 whitespace-nowrap">

                                    <i
                                        data-lucide="calendar-days"
                                        class="h-4 w-4 text-wood-500"
                                    ></i>

                                    <div>

                                        <p class="text-sm text-wood-300">

                                            {{ $message->created_at->format('d M Y') }}

                                        </p>

                                        <p class="text-xs text-wood-500">

                                            {{ $message->created_at->format('H:i') }}

                                        </p>

                                    </div>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-16 text-center"
                            >

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
                                        data-lucide="mail-open"
                                        class="h-7 w-7"
                                    ></i>

                                </div>


                                <h3 class="mt-4 font-serif text-lg text-wood-200">
                                    Belum ada pesan
                                </h3>


                                <p class="mx-auto mt-1 max-w-sm text-sm text-wood-500">
                                    Pesan yang dikirim oleh pengguna melalui
                                    halaman Contact akan muncul di sini.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection