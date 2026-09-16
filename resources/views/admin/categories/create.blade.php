@extends('layouts.admin')

@section('title', 'Tambah Kategori - BookStore')

@section('page-heading', 'Tambah Kategori')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>
            <h2 class="text-2xl font-semibold text-[#f5ebe2]">
                Tambah Kategori
            </h2>

            <p class="text-sm text-[#b07b53] mt-1">
                Tambahkan kategori buku baru ke BookStore.
            </p>
        </div>

        <a
            href="{{ route('categories.index') }}"
            class="admin-secondary inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl"
        >
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali
        </a>

    </div>


    {{-- Validation Error --}}
    @if ($errors->any())

        <div class="mb-6 rounded-2xl border border-red-400/20 bg-red-500/5 px-6 py-5">

            <div class="flex items-start gap-3">

                <i
                    data-lucide="circle-alert"
                    class="w-5 h-5 text-red-400 mt-0.5 shrink-0"
                ></i>

                <div>

                    <h3 class="text-sm font-semibold text-red-300 mb-2">
                        Terdapat kesalahan
                    </h3>

                    <ul class="space-y-1 text-sm text-red-200">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- Main Form --}}
    <div class="admin-card rounded-2xl p-8 md:p-10">

        <form
            action="{{ route('categories.store') }}"
            method="POST"
        >

            @csrf

            {{-- Nama Kategori --}}
            <div class="mb-8">

                <label
                    for="name"
                    class="block text-sm font-semibold text-[#dfc2a6] mb-3"
                >
                    Nama Kategori
                </label>

                <div class="relative">

                    <i
                        data-lucide="tag"
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#895a3a] pointer-events-none"
                    ></i>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="admin-input w-full h-14 pl-12 pr-4 rounded-xl"
                        placeholder="Contoh: Fiksi"
                        required
                    >

                </div>

            </div>


            {{-- Deskripsi --}}
            <div class="mb-8">

                <label
                    for="description"
                    class="block text-sm font-semibold text-[#dfc2a6] mb-3"
                >
                    Deskripsi
                </label>

                <div class="relative">

                    <i
                        data-lucide="align-left"
                        class="absolute left-4 top-5 w-5 h-5 text-[#895a3a] pointer-events-none"
                    ></i>

                    <textarea
                        id="description"
                        name="description"
                        rows="7"
                        class="admin-input w-full pl-12 pr-4 py-4 rounded-xl resize-none"
                        placeholder="Deskripsi kategori..."
                    >{{ old('description') }}</textarea>

                </div>

                <p class="mt-3 text-xs text-[#895a3a]">
                    Masukkan deskripsi singkat mengenai kategori buku.
                </p>

            </div>


            {{-- Divider --}}
            <div class="border-t border-[#67422b]/30 pt-6">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-3">

                    {{-- Batal --}}
                    <a
                        href="{{ route('categories.index') }}"
                        class="admin-secondary inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl"
                    >
                        <i data-lucide="x" class="w-4 h-4"></i>
                        Batal
                    </a>


                    {{-- Simpan --}}
                    <button
                        type="submit"
                        class="admin-primary inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl"
                    >
                        <i data-lucide="save" class="w-4 h-4"></i>
                        Simpan Kategori
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection