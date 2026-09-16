@extends('layouts.admin')

@section('title', 'Data User - BookStore')

@section('page-heading', 'Data User')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}

    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">

        <div>

            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                Management
            </p>

            <h1 class="mt-2 font-serif text-3xl font-bold text-wood-100">
                Data User
            </h1>

            <p class="mt-2 text-sm text-wood-400">
                Daftar pengguna yang terdaftar di BookStore.
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
                data-lucide="users"
                class="h-4 w-4 text-terracotta-400"
            ></i>

            {{ $users->count() }} User

        </div>

    </div>


    {{-- STAT CARD --}}

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

        <div class="admin-card rounded-2xl p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-medium uppercase tracking-wider text-wood-500">
                        Total Pengguna
                    </p>

                    <p class="mt-2 font-serif text-3xl font-bold text-wood-100">
                        {{ $users->count() }}
                    </p>

                    <p class="mt-1 text-xs text-wood-500">
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
                        bg-wood-850
                        text-terracotta-400
                    "
                >

                    <i
                        data-lucide="user-round"
                        class="h-5 w-5"
                    ></i>

                </div>

            </div>

        </div>

    </div>


    {{-- USER TABLE --}}

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
                    Daftar Pengguna
                </h2>

                <p class="mt-1 text-xs text-wood-500">
                    Informasi akun pengguna BookStore
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
                    data-lucide="database"
                    class="h-4 w-4"
                ></i>

                Data User

            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="admin-table w-full">

                <thead>

                    <tr>

                        <th class="w-20">
                            No
                        </th>

                        <th>
                            Pengguna
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Role
                        </th>

                        <th>
                            Terdaftar
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($users as $user)

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


                            {{-- USER --}}

                            <td>

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
                                            bg-terracotta-500/15
                                            text-sm
                                            font-semibold
                                            text-terracotta-400
                                        "
                                    >

                                        {{ strtoupper(substr($user->name, 0, 1)) }}

                                    </div>


                                    <div>

                                        <p class="font-medium text-wood-100">
                                            {{ $user->name }}
                                        </p>

                                        <p class="mt-0.5 text-xs text-wood-500">
                                            User BookStore
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- EMAIL --}}

                            <td>

                                <a
                                    href="mailto:{{ $user->email }}"
                                    class="
                                        inline-flex
                                        items-center
                                        gap-2
                                        text-sm
                                        text-wood-300
                                        transition
                                        hover:text-terracotta-400
                                    "
                                >

                                    <i
                                        data-lucide="mail"
                                        class="h-3.5 w-3.5 text-wood-500"
                                    ></i>

                                    {{ $user->email }}

                                </a>

                            </td>


                            {{-- ROLE --}}

                            <td>

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

                                    {{ ucfirst($user->role) }}

                                </span>

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

                                            {{ $user->created_at->format('d M Y') }}

                                        </p>

                                        <p class="text-xs text-wood-500">

                                            {{ $user->created_at->format('H:i') }}

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
                                        data-lucide="users-round"
                                        class="h-7 w-7"
                                    ></i>

                                </div>


                                <h3 class="mt-4 font-serif text-lg text-wood-200">
                                    Belum ada user
                                </h3>


                                <p class="mx-auto mt-1 max-w-sm text-sm text-wood-500">
                                    Belum ada pengguna yang terdaftar
                                    di BookStore.
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