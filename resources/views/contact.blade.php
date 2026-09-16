@extends('layouts.app')

@section('title', 'Contact - BookStore')

@section('content')

<div class="relative overflow-hidden">

    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>


    {{-- HERO --}}
    <section class="relative z-10 px-4 pb-8 pt-12 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-4xl text-center">

            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-terracotta-400">
                Get In Touch
            </p>

            <h1 class="mt-3 font-serif text-4xl text-wood-100 sm:text-5xl md:text-6xl">
                Contact Us
            </h1>

            <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-wood-400 sm:text-base">
                Punya pertanyaan atau ingin menyampaikan pesan?
                Hubungi kami melalui form di bawah.
            </p>

        </div>

    </section>


    {{-- CONTACT CONTENT --}}
    <section class="relative z-10 px-4 py-8 pb-16 sm:px-6 lg:px-8">

        <div class="mx-auto grid max-w-6xl gap-6 lg:grid-cols-[0.85fr_1.4fr]">


            {{-- CONTACT INFO --}}
            <div class="rounded-2xl border border-wood-700 bg-wood-900/90 p-6 shadow-shelf-back sm:p-8">

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-terracotta-500/10 text-terracotta-400">

                    <i
                        data-lucide="message-circle"
                        class="h-6 w-6"
                    ></i>

                </div>


                <h2 class="mt-5 font-serif text-3xl text-wood-100">
                    Hubungi Kami
                </h2>

                <p class="mt-3 text-sm leading-7 text-wood-400">
                    Silakan kirimkan pertanyaan, masukan,
                    atau pesan yang ingin kamu sampaikan
                    kepada administrator BookStore.
                </p>


                <div class="my-7 h-px bg-wood-700"></div>


                {{-- EMAIL --}}
                <div class="flex gap-4">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-wood-850 text-wood-400">

                        <i
                            data-lucide="mail"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <div>

                        <p class="text-xs uppercase tracking-wider text-wood-500">
                            Email
                        </p>

                        <p class="mt-1 text-sm text-wood-200">
                            admin@bookstore.test
                        </p>

                    </div>

                </div>


                {{-- LOCATION --}}
                <div class="mt-6 flex gap-4">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-wood-850 text-wood-400">

                        <i
                            data-lucide="map-pin"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <div>

                        <p class="text-xs uppercase tracking-wider text-wood-500">
                            Lokasi
                        </p>

                        <p class="mt-1 text-sm text-wood-200">
                            Malang, Jawa Timur
                        </p>

                    </div>

                </div>


                {{-- RESPONSE --}}
                <div class="mt-6 flex gap-4">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-wood-850 text-wood-400">

                        <i
                            data-lucide="clock-3"
                            class="h-5 w-5"
                        ></i>

                    </div>

                    <div>

                        <p class="text-xs uppercase tracking-wider text-wood-500">
                            Response
                        </p>

                        <p class="mt-1 text-sm leading-6 text-wood-300">
                            Pesan akan diterima oleh administrator
                            BookStore.
                        </p>

                    </div>

                </div>


                {{-- DECORATION --}}
                <div class="mt-8 rounded-xl border border-wood-700 bg-wood-850 p-4">

                    <div class="flex items-start gap-3">

                        <i
                            data-lucide="book-open"
                            class="mt-0.5 h-5 w-5 shrink-0 text-terracotta-400"
                        ></i>

                        <p class="text-xs leading-5 text-wood-500">
                            Ada pertanyaan mengenai buku atau layanan
                            BookStore? Jangan ragu untuk menghubungi kami.
                        </p>

                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <div class="rounded-2xl border border-wood-700 bg-wood-900/90 p-6 shadow-shelf-back sm:p-8">

                <div class="mb-6">

                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-terracotta-400">
                        Message
                    </p>

                    <h2 class="mt-1 font-serif text-3xl text-wood-100">
                        Kirim Pesan
                    </h2>

                    <p class="mt-2 text-sm text-wood-400">
                        Isi form berikut untuk menghubungi admin.
                    </p>

                </div>


                {{-- SUCCESS --}}
                <!-- @if(session('success'))

                    <div class="alert-message mb-5 flex items-center gap-3 rounded-xl border border-green-700/50 bg-green-950/40 px-4 py-3 text-sm text-green-300">

                        <i
                            data-lucide="circle-check"
                            class="h-5 w-5 shrink-0"
                        ></i>

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                @endif -->


                {{-- ERROR --}}
                @if(session('error'))

                    <div class="alert-message mb-5 flex items-center gap-3 rounded-xl border border-red-700/50 bg-red-950/40 px-4 py-3 text-sm text-red-300">

                        <i
                            data-lucide="circle-alert"
                            class="h-5 w-5 shrink-0"
                        ></i>

                        <span>
                            {{ session('error') }}
                        </span>

                    </div>

                @endif


                {{-- VALIDATION --}}
                @if($errors->any())

                    <div class="mb-5 rounded-xl border border-red-700/50 bg-red-950/40 px-4 py-4 text-sm text-red-300">

                        <div class="flex items-center gap-2 font-medium">

                            <i
                                data-lucide="triangle-alert"
                                class="h-5 w-5"
                            ></i>

                            Terdapat kesalahan pada form.

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


                {{-- FORM --}}
                <form
                    action="{{ route('contact.store') }}"
                    method="POST"
                    class="space-y-5"
                >

                    @csrf


                    {{-- NAME --}}
                    <div>

                        <label
                            for="name"
                            class="mb-2 block text-sm font-medium text-wood-200"
                        >
                            Nama
                        </label>

                        <div class="relative">

                            <i
                                data-lucide="user"
                                class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-wood-500"
                            ></i>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name', auth()->user()->name) }}"
                                placeholder="Masukkan nama"
                                required
                                class="bookstore-input w-full rounded-xl border border-wood-700 bg-wood-850 py-3 pl-11 pr-4 text-sm text-wood-100 placeholder-wood-500 outline-none transition focus:border-terracotta-400 focus:ring-1 focus:ring-terracotta-400"
                            >

                        </div>

                    </div>


                    {{-- EMAIL --}}
                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-wood-200"
                        >
                            Email
                        </label>

                        <div class="relative">

                            <i
                                data-lucide="mail"
                                class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-wood-500"
                            ></i>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                placeholder="Masukkan email"
                                required
                                class="bookstore-input w-full rounded-xl border border-wood-700 bg-wood-850 py-3 pl-11 pr-4 text-sm text-wood-100 placeholder-wood-500 outline-none transition focus:border-terracotta-400 focus:ring-1 focus:ring-terracotta-400"
                            >

                        </div>

                    </div>


                    {{-- MESSAGE --}}
                    <div>

                        <label
                            for="message"
                            class="mb-2 block text-sm font-medium text-wood-200"
                        >
                            Pesan
                        </label>

                        <div class="relative">

                            <i
                                data-lucide="message-square"
                                class="pointer-events-none absolute left-4 top-4 h-4 w-4 text-wood-500"
                            ></i>

                            <textarea
                                id="message"
                                name="message"
                                rows="7"
                                placeholder="Tuliskan pesan kamu..."
                                required
                                class="bookstore-input w-full resize-none rounded-xl border border-wood-700 bg-wood-850 py-3 pl-11 pr-4 text-sm text-wood-100 placeholder-wood-500 outline-none transition focus:border-terracotta-400 focus:ring-1 focus:ring-terracotta-400"
                            >{{ old('message') }}</textarea>

                        </div>

                    </div>


                    {{-- SUBMIT --}}
                    <button
                        type="submit"
                        class="btn-terracotta inline-flex w-full items-center justify-center gap-2 rounded-xl px-5 py-3.5 font-semibold"
                    >

                        <i
                            data-lucide="send"
                            class="h-5 w-5"
                        ></i>

                        Kirim Pesan

                    </button>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection