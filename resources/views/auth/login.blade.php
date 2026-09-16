@extends('layouts.app')

@section('title', 'Login - BookStore')

@section('content')

<div class="relative flex min-h-[calc(100vh-76px)] items-center justify-center overflow-hidden px-4 py-12">

    {{-- BACKGROUND GLOW --}}
    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>


    <div class="relative z-10 w-full max-w-md">


        {{-- ================================================= --}}
        {{-- BRAND --}}
        {{-- ================================================= --}}

        <div class="mb-8 text-center">

            <div
                class="
                    mx-auto flex h-16 w-16
                    items-center justify-center
                    rounded-2xl
                    border border-wood-600
                    bg-wood-900
                    text-terracotta-400
                    shadow-shelf-back
                "
            >

                <i
                    data-lucide="book-open"
                    class="h-8 w-8"
                ></i>

            </div>


            <p
                class="
                    mt-5
                    text-xs
                    font-semibold
                    uppercase
                    tracking-[0.25em]
                    text-terracotta-400
                "
            >
                Welcome Back
            </p>


            <h1
                class="
                    mt-2
                    font-serif
                    text-4xl
                    text-wood-100
                "
            >
                Selamat Datang
            </h1>


            <p
                class="
                    mt-2
                    text-sm
                    text-wood-400
                "
            >
                Masuk ke akun BookStore kamu.
            </p>

        </div>


        {{-- ================================================= --}}
        {{-- LOGIN CARD --}}
        {{-- ================================================= --}}

        <div
            class="
                rounded-2xl
                border border-wood-700
                bg-wood-900/90
                p-6
                shadow-shelf-back
                sm:p-8
            "
        >


            {{-- ================================================= --}}
            {{-- ERROR --}}
            {{-- ================================================= --}}

            @if($errors->any())

                <div
                    class="
                        mb-5
                        rounded-xl
                        border border-red-700/50
                        bg-red-950/40
                        px-4 py-4
                        text-sm
                        text-red-300
                    "
                >

                    <div class="flex items-center gap-2 font-medium">

                        <i
                            data-lucide="triangle-alert"
                            class="h-5 w-5"
                        ></i>

                        Login gagal

                    </div>


                    <ul class="mt-2 list-disc space-y-1 pl-6">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- ================================================= --}}
            {{-- SUCCESS --}}
            {{-- ================================================= --}}
            
            {{-- 
                Success message TIDAK ditampilkan di sini
                karena sudah ditampilkan oleh layouts.app
            --}}


            {{-- ================================================= --}}
            {{-- LOGIN FORM --}}
            {{-- ================================================= --}}

            <form
                action="{{ route('login') }}"
                method="POST"
                class="space-y-5"
            >

                @csrf


                {{-- EMAIL --}}

                <div>

                    <label
                        for="email"
                        class="
                            mb-2
                            block
                            text-sm
                            font-medium
                            text-wood-200
                        "
                    >
                        Email
                    </label>


                    <div class="relative">

                        <i
                            data-lucide="mail"
                            class="
                                pointer-events-none
                                absolute
                                left-4
                                top-1/2
                                h-4 w-4
                                -translate-y-1/2
                                text-wood-500
                            "
                        ></i>


                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required
                            autofocus
                            autocomplete="email"
                            class="
                                bookstore-input
                                w-full
                                rounded-xl
                                border border-wood-700
                                bg-wood-850
                                py-3
                                pl-11
                                pr-4
                                text-sm
                                text-wood-100
                                placeholder-wood-500
                                outline-none
                                transition
                                focus:border-terracotta-400
                                focus:ring-1
                                focus:ring-terracotta-400
                            "
                        >

                    </div>

                </div>


                {{-- PASSWORD --}}

                <div>

                    <label
                        for="password"
                        class="
                            mb-2
                            block
                            text-sm
                            font-medium
                            text-wood-200
                        "
                    >
                        Password
                    </label>


                    <div class="relative">

                        <i
                            data-lucide="lock"
                            class="
                                pointer-events-none
                                absolute
                                left-4
                                top-1/2
                                h-4 w-4
                                -translate-y-1/2
                                text-wood-500
                            "
                        ></i>


                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                            class="
                                bookstore-input
                                w-full
                                rounded-xl
                                border border-wood-700
                                bg-wood-850
                                py-3
                                pl-11
                                pr-4
                                text-sm
                                text-wood-100
                                placeholder-wood-500
                                outline-none
                                transition
                                focus:border-terracotta-400
                                focus:ring-1
                                focus:ring-terracotta-400
                            "
                        >

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- LOGIN BUTTON --}}
                {{-- ================================================= --}}

                <button
                    type="submit"
                    class="
                        btn-terracotta
                        inline-flex
                        w-full
                        items-center
                        justify-center
                        gap-2
                        rounded-xl
                        px-5
                        py-3.5
                        font-semibold
                    "
                >

                    <i
                        data-lucide="log-in"
                        class="h-5 w-5"
                    ></i>

                    Login

                </button>

            </form>


            {{-- ================================================= --}}
            {{-- REGISTER --}}
            {{-- ================================================= --}}

            <div
                class="
                    mt-6
                    border-t
                    border-wood-700
                    pt-6
                    text-center
                "
            >

                <p class="text-sm text-wood-500">
                    Belum punya akun?
                </p>


                {{-- 
                    INI YANG MENGARAH KE REGISTER
                --}}

                <a
                    href="{{ route('register') }}"
                    class="
                        mt-2
                        inline-flex
                        items-center
                        gap-2
                        text-sm
                        font-semibold
                        text-terracotta-400
                        transition
                        hover:text-terracotta-300
                    "
                >

                    Daftar sekarang

                    <i
                        data-lucide="arrow-right"
                        class="h-4 w-4"
                    ></i>

                </a>

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- BACK HOME --}}
        {{-- ================================================= --}}

        <div class="mt-5 text-center">

            <a
                href="{{ route('home') }}"
                class="
                    inline-flex
                    items-center
                    gap-2
                    text-sm
                    text-wood-500
                    transition
                    hover:text-wood-300
                "
            >

                <i
                    data-lucide="arrow-left"
                    class="h-4 w-4"
                ></i>

                Kembali ke Home

            </a>

        </div>

    </div>

</div>

@endsection