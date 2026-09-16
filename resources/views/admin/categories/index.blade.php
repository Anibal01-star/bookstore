@extends('layouts.admin')

@section('title', 'Kategori - BookStore Admin')

@section('page-heading', 'Kategori Buku')

@section('content')

{{-- Header --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

    <div>
        <div class="flex items-center gap-3 mb-2">
            <div class="w-11 h-11 rounded-xl bg-[#d76239]/15 flex items-center justify-center">
                <i
                    data-lucide="tags"
                    class="w-5 h-5 text-[#e57a53]"
                ></i>
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-[#f5ebe2]">
                    Kategori Buku
                </h2>

                <p class="text-sm text-[#b07b53]">
                    Kelola kategori buku BookStore.
                </p>
            </div>
        </div>
    </div>

    <a
        href="{{ route('categories.create') }}"
        class="admin-primary inline-flex items-center justify-center gap-2"
    >
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Kategori
    </a>

</div>


{{-- Statistik --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 mb-8">

    <div class="stat-card">
        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-[#b07b53] mb-1">
                    Total Kategori
                </p>

                <p class="text-2xl font-semibold text-[#f5ebe2]">
                    {{ $categories->count() }}
                </p>
            </div>

            <div class="w-11 h-11 rounded-xl bg-[#d76239]/15 flex items-center justify-center">
                <i
                    data-lucide="layers"
                    class="w-5 h-5 text-[#e57a53]"
                ></i>
            </div>

        </div>
    </div>

</div>


{{-- Table --}}
@if ($categories->count())

    <div class="admin-card p-0 overflow-hidden">

        {{-- Table Header --}}
        <div class="px-6 py-5 border-b border-[#67422b]/30">

            <div class="flex items-center justify-between">

                <div>
                    <h3 class="text-lg font-semibold text-[#f5ebe2]">
                        Daftar Kategori
                    </h3>

                    <p class="text-sm text-[#895a3a] mt-1">
                        {{ $categories->count() }} kategori tersedia.
                    </p>
                </div>

                <div class="w-10 h-10 rounded-xl bg-[#67422b]/20 flex items-center justify-center">
                    <i
                        data-lucide="folder"
                        class="w-5 h-5 text-[#b07b53]"
                    ></i>
                </div>

            </div>

        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="admin-table w-full">

                <thead>
                    <tr>
                        <th class="w-16">
                            #
                        </th>

                        <th>
                            Nama Kategori
                        </th>

                        <th>
                            Deskripsi
                        </th>

                        <th class="w-48">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($categories as $category)

                        <tr>

                            {{-- Number --}}
                            <td class="text-[#895a3a]">
                                {{ $loop->iteration }}
                            </td>


                            {{-- Category Name --}}
                            <td>

                                <div class="flex items-center gap-3">

                                    <div class="w-9 h-9 rounded-lg bg-[#67422b]/25 flex items-center justify-center shrink-0">

                                        <i
                                            data-lucide="tag"
                                            class="w-4 h-4 text-[#b07b53]"
                                        ></i>

                                    </div>

                                    <div>

                                        <p class="font-medium text-[#f5ebe2]">
                                            {{ $category->name }}
                                        </p>

                                        <p class="text-xs text-[#895a3a]">
                                            ID #{{ $category->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- Description --}}
                            <td>

                                @if ($category->description)

                                    <p class="text-sm text-[#dfc2a6] max-w-md">
                                        {{ $category->description }}
                                    </p>

                                @else

                                    <span class="text-sm text-[#895a3a] italic">
                                        Tidak ada deskripsi
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td>

                                <div class="flex items-center gap-2">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('categories.edit', $category) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg
                                               bg-[#67422b]/30 text-[#dfc2a6]
                                               hover:bg-[#67422b]/50 hover:text-[#f5ebe2]
                                               transition text-sm"
                                    >
                                        <i
                                            data-lucide="pencil"
                                            class="w-4 h-4"
                                        ></i>

                                        Edit
                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('categories.destroy', $category) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg
                                                   bg-red-500/10 text-red-300
                                                   hover:bg-red-500/20 hover:text-red-200
                                                   transition text-sm"
                                        >

                                            <i
                                                data-lucide="trash-2"
                                                class="w-4 h-4"
                                            ></i>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

@else

    {{-- Empty State --}}
    <div class="admin-card">

        <div class="text-center py-14">

            <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-[#67422b]/20 flex items-center justify-center">

                <i
                    data-lucide="folder-open"
                    class="w-8 h-8 text-[#895a3a]"
                ></i>

            </div>

            <h3 class="text-lg font-semibold text-[#f5ebe2] mb-2">
                Belum ada kategori
            </h3>

            <p class="text-sm text-[#895a3a] max-w-sm mx-auto mb-6">
                Belum ada kategori buku yang tersedia.
                Silakan tambahkan kategori terlebih dahulu.
            </p>

            <a
                href="{{ route('categories.create') }}"
                class="admin-primary inline-flex items-center gap-2"
            >
                <i data-lucide="plus" class="w-4 h-4"></i>
                Tambah Kategori
            </a>

        </div>

    </div>

@endif

@endsection