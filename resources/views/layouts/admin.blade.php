<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title', 'Admin - BookStore')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Lucide --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>

        tailwind.config = {

            theme: {

                extend: {

                    colors: {

                        wood: {
                            950: '#150d09',
                            900: '#23150e',
                            850: '#2a1a12',
                            800: '#382216',
                            700: '#4d301f',
                            600: '#67422b',
                            500: '#895a3a',
                            400: '#b07b53',
                            200: '#dfc2a6',
                            100: '#f5ebe2',
                        },

                        terracotta: {
                            400: '#e57a53',
                            500: '#d76239',
                            600: '#bc4e28',
                        },

                        amberlight: '#ffdf9e',

                    },

                    fontFamily: {

                        serif: [
                            '"Playfair Display"',
                            'serif'
                        ],

                        sans: [
                            '"Plus Jakarta Sans"',
                            'sans-serif'
                        ],

                    },

                }

            }

        };

    </script>


    <style>

        * {
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {

            margin: 0;

            color: #f5ebe2;

            font-family:
                "Plus Jakarta Sans",
                sans-serif;

            background-color: #150d09;

            background-image:

                radial-gradient(
                    ellipse at top center,
                    rgba(82, 47, 27, .42) 0%,
                    rgba(20, 11, 7, .95) 75%
                ),

                repeating-linear-gradient(
                    90deg,
                    rgba(255,255,255,.012) 0px,
                    rgba(255,255,255,.012) 2px,
                    transparent 2px,
                    transparent 8px
                ),

                linear-gradient(
                    to bottom,
                    #2b1a12 0%,
                    #1a0f0a 100%
                );

            min-height: 100vh;

        }


        /* ================================
           SCROLLBAR
        ================================= */

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #190f09;
        }

        ::-webkit-scrollbar-thumb {
            background: #462c1d;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #633f2a;
        }


        /* ================================
           SIDEBAR
        ================================= */

        .admin-sidebar {

            background:

                linear-gradient(
                    180deg,
                    rgba(42, 26, 18, .98),
                    rgba(21, 13, 9, .98)
                );

            border-right:
                1px solid
                rgba(103,66,43,.55);

            box-shadow:
                12px 0 30px rgba(0,0,0,.18);

        }


        /* ================================
           NAVIGATION
        ================================= */

        .admin-nav {

            display: flex;

            align-items: center;

            gap: 12px;

            width: 100%;

            padding:
                11px 13px;

            border-radius: 12px;

            color: #b07b53;

            font-size: 13px;

            transition:
                background .2s ease,
                color .2s ease,
                transform .2s ease;

        }


        .admin-nav:hover {

            background:
                rgba(56,34,22,.8);

            color:
                #f5ebe2;

            transform:
                translateX(2px);

        }


        .admin-nav.active {

            background:

                linear-gradient(
                    135deg,
                    rgba(215,98,57,.20),
                    rgba(188,78,40,.08)
                );

            color:
                #ffdf9e;

            border:
                1px solid
                rgba(229,122,83,.22);

        }


        /* ================================
           CONTENT CARD
        ================================= */

        .admin-card {

            background:

                linear-gradient(
                    145deg,
                    rgba(56,34,22,.92),
                    rgba(35,21,14,.92)
                );

            border:
                1px solid
                rgba(103,66,43,.45);

            box-shadow:
                0 18px 40px rgba(0,0,0,.25);

        }


        /* ================================
           STAT CARD
        ================================= */

        .stat-card {

            position:
                relative;

            overflow:
                hidden;

            background:

                linear-gradient(
                    145deg,
                    #382216,
                    #23150e
                );

            border:
                1px solid
                rgba(103,66,43,.48);

            border-radius:
                18px;

            padding:
                22px;

            transition:
                transform .25s ease,
                border-color .25s ease;

        }


        .stat-card:hover {

            transform:
                translateY(-3px);

            border-color:
                rgba(229,122,83,.45);

        }


        /* ================================
           TABLE
        ================================= */

        .admin-table {

            width:
                100%;

            border-collapse:
                collapse;

        }


        .admin-table th {

            padding:
                14px 18px;

            background:
                #2a1a12;

            color:
                #b07b53;

            font-size:
                10px;

            font-weight:
                600;

            text-transform:
                uppercase;

            letter-spacing:
                .1em;

            text-align:
                left;

            white-space:
                nowrap;

        }


        .admin-table td {

            padding:
                15px 18px;

            border-top:
                1px solid
                rgba(103,66,43,.30);

            color:
                #dfc2a6;

            font-size:
                13px;

        }


        .admin-table tbody tr {

            transition:
                background .2s ease;

        }


        .admin-table tbody tr:hover {

            background:
                rgba(56,34,22,.55);

        }


        /* ================================
           INPUT
        ================================= */

        .admin-input {

            width:
                100%;

            padding:
                11px 13px;

            background:
                #2a1a12;

            border:
                1px solid
                #4d301f;

            border-radius:
                11px;

            color:
                #f5ebe2;

            font-size:
                13px;

            outline:
                none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease;

        }


        .admin-input::placeholder {
            color: #895a3a;
        }


        .admin-input:focus {

            border-color:
                #e57a53;

            box-shadow:
                0 0 0 3px
                rgba(229,122,83,.10);

        }


        /* ================================
           PRIMARY BUTTON
        ================================= */

        .admin-primary {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                8px;

            padding:
                10px 15px;

            border-radius:
                11px;

            background:

                linear-gradient(
                    135deg,
                    #e57a53,
                    #bc4e28
                );

            color:
                white;

            font-size:
                13px;

            font-weight:
                600;

            transition:
                transform .2s ease,
                box-shadow .2s ease;

        }


        .admin-primary:hover {

            transform:
                translateY(-1px);

            box-shadow:
                0 8px 20px
                rgba(188,78,40,.25);

        }


        /* ================================
           SECONDARY BUTTON
        ================================= */

        .admin-secondary {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                8px;

            padding:
                9px 14px;

            border-radius:
                10px;

            background:
                #382216;

            border:
                1px solid
                #67422b;

            color:
                #dfc2a6;

            font-size:
                13px;

            transition:
                all .2s ease;

        }


        .admin-secondary:hover {

            background:
                #4d301f;

            color:
                #f5ebe2;

        }


        /* ================================
           MOBILE SIDEBAR
        ================================= */

        @media(max-width:1023px) {

            .admin-sidebar {

                display:
                    none;

            }

        }

    </style>

    @stack('styles')

</head>


<body>


{{-- ========================================================= --}}
{{-- SIDEBAR --}}
{{-- ========================================================= --}}

<aside
    class="
        admin-sidebar
        fixed
        left-0
        top-0
        z-50
        hidden
        h-screen
        w-64
        lg:block
    "
>

    <div class="flex h-full flex-col">


        {{-- LOGO --}}

        <div
            class="
                flex
                h-[76px]
                items-center
                gap-3
                border-b
                border-wood-700/50
                px-6
            "
        >

            <div
                class="
                    flex
                    h-10
                    w-10
                    shrink-0
                    items-center
                    justify-center
                    rounded-xl
                    bg-gradient-to-br
                    from-terracotta-400
                    to-terracotta-600
                    shadow-lg
                    shadow-terracotta-600/20
                "
            >

                <i
                    data-lucide="book-open"
                    class="h-5 w-5 text-white"
                ></i>

            </div>


            <div>

                <h1
                    class="
                        font-serif
                        text-xl
                        font-bold
                        leading-none
                        text-wood-100
                    "
                >
                    BookStore
                </h1>

                <p
                    class="
                        mt-1
                        text-[9px]
                        uppercase
                        tracking-[.18em]
                        text-wood-500
                    "
                >
                    Admin Panel
                </p>

            </div>

        </div>


        {{-- SIDEBAR MENU --}}

        <nav
            class="
                flex-1
                overflow-y-auto
                px-4
                py-6
            "
        >

            {{-- MAIN --}}

            <p
                class="
                    mb-3
                    px-3
                    text-[10px]
                    font-semibold
                    uppercase
                    tracking-[.18em]
                    text-wood-600
                "
            >
                Main
            </p>


            <a
                href="{{ route('admin.dashboard') }}"
                class="
                    admin-nav
                    {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}
                "
            >

                <i
                    data-lucide="layout-dashboard"
                    class="h-4 w-4"
                ></i>

                Dashboard

            </a>


            {{-- CATALOG --}}

            <p
                class="
                    mb-3
                    mt-7
                    px-3
                    text-[10px]
                    font-semibold
                    uppercase
                    tracking-[.18em]
                    text-wood-600
                "
            >
                Catalog
            </p>


            <a
                href="{{ route('books.index') }}"
                class="
                    admin-nav
                    {{ request()->routeIs('books.*') ? 'active' : '' }}
                "
            >

                <i
                    data-lucide="book-open"
                    class="h-4 w-4"
                ></i>

                Buku

            </a>


            <a
                href="{{ route('categories.index') }}"
                class="
                    admin-nav
                    {{ request()->routeIs('categories.*') ? 'active' : '' }}
                "
            >

                <i
                    data-lucide="tags"
                    class="h-4 w-4"
                ></i>

                Kategori

            </a>


            {{-- MANAGEMENT --}}

            <p
                class="
                    mb-3
                    mt-7
                    px-3
                    text-[10px]
                    font-semibold
                    uppercase
                    tracking-[.18em]
                    text-wood-600
                "
            >
                Management
            </p>


            <a
                href="{{ route('admin.orders') }}"
                class="
                    admin-nav
                    {{ request()->routeIs('admin.orders*') ? 'active' : '' }}
                "
            >

                <i
                    data-lucide="shopping-bag"
                    class="h-4 w-4"
                ></i>

                Pesanan

            </a>


            <a
                href="{{ route('admin.users') }}"
                class="
                    admin-nav
                    {{ request()->routeIs('admin.users') ? 'active' : '' }}
                "
            >

                <i
                    data-lucide="users"
                    class="h-4 w-4"
                ></i>

                Users

            </a>


            <a
                href="{{ route('admin.messages') }}"
                class="
                    admin-nav
                    {{ request()->routeIs('admin.messages') ? 'active' : '' }}
                "
            >

                <i
                    data-lucide="mail"
                    class="h-4 w-4"
                ></i>

                Pesan

            </a>

        </nav>


        {{-- SIDEBAR FOOTER --}}

        <div
            class="
                border-t
                border-wood-700/50
                p-4
            "
        >

            <a
                href="{{ route('home') }}"
                class="admin-nav"
            >

                <i
                    data-lucide="external-link"
                    class="h-4 w-4"
                ></i>

                Lihat Website

            </a>


            <form
                action="{{ route('logout') }}"
                method="POST"
                class="mt-1"
            >

                @csrf

                <button
                    type="submit"
                    class="
                        admin-nav
                        text-left
                        hover:!text-red-400
                    "
                >

                    <i
                        data-lucide="log-out"
                        class="h-4 w-4"
                    ></i>

                    Logout

                </button>

            </form>

        </div>

    </div>

</aside>


{{-- ========================================================= --}}
{{-- MAIN CONTENT --}}
{{-- ========================================================= --}}

<div class="min-h-screen lg:ml-64">


    {{-- TOPBAR --}}

    <header
        class="
            sticky
            top-0
            z-40
            border-b
            border-wood-700/50
            bg-wood-950/90
            backdrop-blur-xl
        "
    >

        <div
            class="
                flex
                h-[76px]
                items-center
                justify-between
                px-5
                lg:px-8
            "
        >

            <div>

                <p
                    class="
                        text-[10px]
                        font-semibold
                        uppercase
                        tracking-[.2em]
                        text-terracotta-400
                    "
                >
                    BookStore Admin
                </p>

                <h2
                    class="
                        mt-1
                        font-serif
                        text-xl
                        text-wood-100
                    "
                >
                    @yield('page-heading', 'Dashboard')
                </h2>

            </div>


            {{-- ADMIN USER --}}

            <div
                class="
                    flex
                    items-center
                    gap-3
                "
            >

                <div class="hidden text-right sm:block">

                    <p
                        class="
                            text-xs
                            font-semibold
                            text-wood-100
                        "
                    >
                        {{ auth()->user()->name }}
                    </p>

                    <p
                        class="
                            mt-0.5
                            text-[10px]
                            text-wood-500
                        "
                    >
                        Administrator
                    </p>

                </div>


                <div
                    class="
                        flex
                        h-10
                        w-10
                        items-center
                        justify-center
                        rounded-full
                        border
                        border-wood-600
                        bg-wood-800
                    "
                >

                    <i
                        data-lucide="user"
                        class="h-4 w-4 text-amberlight"
                    ></i>

                </div>

            </div>

        </div>

    </header>


    {{-- FLASH MESSAGE --}}

    <div class="px-5 pt-5 lg:px-8">

        @if(session('success'))

            <div
                class="
                    alert-message
                    flex
                    items-center
                    gap-3
                    rounded-xl
                    border
                    border-emerald-500/20
                    bg-emerald-500/10
                    px-4
                    py-3
                    text-sm
                    text-emerald-300
                "
            >

                <i
                    data-lucide="circle-check"
                    class="h-5 w-5 shrink-0"
                ></i>

                {{ session('success') }}

            </div>

        @endif


        @if(session('error'))

            <div
                class="
                    alert-message
                    flex
                    items-center
                    gap-3
                    rounded-xl
                    border
                    border-red-500/20
                    bg-red-500/10
                    px-4
                    py-3
                    text-sm
                    text-red-300
                "
            >

                <i
                    data-lucide="circle-alert"
                    class="h-5 w-5 shrink-0"
                ></i>

                {{ session('error') }}

            </div>

        @endif

    </div>


    {{-- PAGE CONTENT --}}

    <main
        class="
            px-5
            py-8
            lg:px-8
        "
    >

        @yield('content')

    </main>

</div>


{{-- LUCIDE --}}

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            if (window.lucide) {

                lucide.createIcons();

            }

        }
    );

</script>


@stack('scripts')

</body>

</html>