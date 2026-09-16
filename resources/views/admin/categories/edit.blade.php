@extends('layouts.admin')

@section('title', 'Edit Kategori - BookStore')

@section('page-heading', 'Edit Kategori')

@section('content')

<div class="max-w-2xl mx-auto">

    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a
            href="{{ route('categories.index') }}"
            class="admin-secondary inline-flex items-center gap-2"
        >
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali
        </a>
    </div>

    {{-- Validation Error --}}
    @if ($errors->any())
        <div class="admin-card mb-6 border border-red-400/30">
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

    {{-- Form Card --}}
    <div class="admin-card">

        <div class="mb-8">
            <div class="flex items-center gap-3 mb-2">

                <div class="w-10 h-10 rounded-xl bg-[#d76239]/15 flex items-center justify-center">
                    <i
                        data-lucide="folder-pen"
                        class="w-5 h-5 text-[#e57a53]"
                    ></i>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-[#f5ebe2]">
                        Edit Kategori
                    </h2>

                    <p class="text-sm text-[#b07b53]">
                        Perbarui informasi kategori buku.
                    </p>
                </div>

            </div>
        </div>

        <form
            action="{{ route('categories.update', $category) }}"
            method="POST"
            class="space-y-6"
        >

            @csrf
            @method('PUT')

            {{-- Nama Kategori --}}
            <div>
                <label
                    for="name"
                    class="block text-sm font-medium text-[#dfc2a6] mb-2"
                >
                    Nama Kategori
                </label>

                <div class="relative">

                    <i
                        data-lucide="tag"
                        class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#895a3a]"
                    ></i>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $category->name) }}"
                        class="admin-input pl-10"
                        placeholder="Contoh: Fiksi"
                        required
                    >

                </div>
            </div>

            {{-- Deskripsi --}}
            <div>

                <label
                    for="description"
                    class="block text-sm font-medium text-[#dfc2a6] mb-2"
                >
                    Deskripsi
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    class="admin-input resize-none"
                    placeholder="Deskripsi kategori..."
                >{{ old('description', $category->description) }}</textarea>

                <p class="mt-2 text-xs text-[#895a3a]">
                    Perbarui deskripsi kategori jika diperlukan.
                </p>

            </div>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-[#67422b]/30">

                <a
                    href="{{ route('categories.index') }}"
                    class="admin-secondary inline-flex items-center justify-center gap-2"
                >
                    <i data-lucide="x" class="w-4 h-4"></i>
                    Batal
                </a>

                <button
                    type="submit"
                    class="admin-primary inline-flex items-center justify-center gap-2"
                >
                    <i data-lucide="save" class="w-4 h-4"></i>
                    Update Kategori
                </button>

            </div>

        </form>

    </div>

</div>

@endsection