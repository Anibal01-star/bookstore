<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'BookStore')</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >
    {{-- GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    {{-- TAILWIND --}}
    <script src="https://cdn.tailwindcss.com"></script>


    {{-- CUSTOM CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}"
    >


    {{-- LUCIDE --}}
    <script src="https://unpkg.com/lucide@latest"></script>


    {{-- TAILWIND CONFIG --}}
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


                    boxShadow: {

                        'book-3d':
                            '-6px 10px 18px rgba(0, 0, 0, 0.55), 2px 2px 5px rgba(0, 0, 0, 0.3)',

                        'shelf':
                            '0 22px 28px -6px rgba(0, 0, 0, 0.85), inset 0 2px 4px rgba(255, 230, 190, 0.25), inset 0 -6px 12px rgba(10, 5, 2, 0.9)',

                    }

                }
            }
        };
    </script>


    {{-- GLOBAL STYLE --}}
    <style>

        * {
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            background-color: #150d09;
            color: #f5ebe2;
            font-family: "Plus Jakarta Sans", sans-serif;

            background-image:

                radial-gradient(
                    ellipse at top center,
                    rgba(82, 47, 27, 0.45) 0%,
                    rgba(20, 11, 7, 0.95) 80%
                ),

                repeating-linear-gradient(
                    90deg,
                    rgba(255,255,255,0.015) 0px,
                    rgba(255,255,255,0.015) 2px,
                    transparent 2px,
                    transparent 8px
                ),

                linear-gradient(
                    to bottom,
                    #2b1a12 0%,
                    #1a0f0a 100%
                );
        }


        .font-serif {
            font-family: "Playfair Display", serif;
        }


        /* SCROLLBAR */

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


        /* NAVBAR */

        .glass-nav {
            background: rgba(21, 13, 9, 0.92);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }


        /* BOOK CARD */

        .book-card {
            transition:
                transform 0.3s cubic-bezier(0.25, 1, 0.5, 1),
                box-shadow 0.3s ease;
        }

        .book-card:hover {
            transform:
                translateY(-8px)
                scale(1.025);

            z-index: 10;
        }


        /* SHELF */

        .shelf-plank {
            height: 24px;

            background:
                linear-gradient(
                    180deg,
                    #744b30 0%,
                    #4a2d1a 45%,
                    #2a160a 90%,
                    #150904 100%
                );

            border-top: 2px solid #a26d48;
            border-bottom: 3px solid #0f0703;

            box-shadow:
                0 15px 20px rgba(0,0,0,.7),
                inset 0 2px 4px rgba(255,230,190,.2);
        }


        /* WARM LIGHT */

        .warm-light {
            width: 7px;
            height: 10px;
            display: inline-block;

            background:
                radial-gradient(
                    circle at 40% 30%,
                    #ffffff,
                    #ffe299 60%,
                    #ff9e3b 100%
                );

            border-radius: 50%;

            box-shadow:
                0 0 10px 3px rgba(255,210,130,.85),
                0 0 20px 6px rgba(240,140,40,.4);
        }


        /* ALERT */

        .alert-message {
            animation:
                slideDown
                .35s
                ease-out;
        }


        @keyframes slideDown {

            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        /* MOBILE */

        @media (max-width: 640px) {

            .book-card:hover {
                transform:
                    translateY(-4px)
                    scale(1.01);
            }

        }

    </style>


    @stack('styles')

</head>


<body class="min-h-screen antialiased">


    {{-- ========================================================= --}}
    {{-- NAVBAR --}}
    {{-- ========================================================= --}}

    <header class="glass-nav sticky top-0 z-50 border-b border-wood-800/80">

        <div class="mx-auto max-w-7xl px-5 lg:px-8">

            <div class="flex h-[76px] items-center justify-between gap-6">


                {{-- ================================================= --}}
                {{-- LOGO --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('home') }}"
                    class="group flex items-center gap-3"
                >

                    <div
                        class="
                            flex h-10 w-10 items-center justify-center
                            rounded-xl
                            bg-gradient-to-br
                            from-terracotta-400
                            to-terracotta-600
                            shadow-lg
                            shadow-terracotta-600/20
                            transition
                            group-hover:scale-105
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
                                text-2xl
                                font-bold
                                leading-none
                                text-amber-50
                            "
                        >
                            BookStore
                        </h1>

                        <p
                            class="
                                mt-1
                                text-[10px]
                                uppercase
                                tracking-widest
                                text-wood-400
                            "
                        >
                            Find your next story
                        </p>

                    </div>

                </a>


                {{-- ================================================= --}}
                {{-- NAVIGATION --}}
                {{-- ================================================= --}}

                <nav class="hidden items-center gap-1 md:flex">


                    {{-- HOME --}}

                    <a
                        href="{{ route('home') }}"
                        class="
                            rounded-full
                            px-4
                            py-2
                            text-sm
                            transition

                            {{ request()->routeIs('home')
                                ? 'border border-amber-600/30 bg-wood-800 text-amber-200'
                                : 'text-wood-300 hover:bg-wood-800 hover:text-amber-100'
                            }}
                        "
                    >
                        Home
                    </a>


                    {{-- ABOUT --}}

                    <a
                        href="{{ route('about') }}"
                        class="
                            rounded-full
                            px-4
                            py-2
                            text-sm
                            transition

                            {{ request()->routeIs('about')
                                ? 'border border-amber-600/30 bg-wood-800 text-amber-200'
                                : 'text-wood-300 hover:bg-wood-800 hover:text-amber-100'
                            }}
                        "
                    >
                        About
                    </a>


                    {{-- CONTACT --}}
                    {{-- Contact dapat diakses sebelum dan sesudah login --}}

                    <a
                        href="{{ route('contact') }}"
                        class="
                            rounded-full
                            px-4
                            py-2
                            text-sm
                            transition

                            {{ request()->routeIs('contact')
                                ? 'border border-amber-600/30 bg-wood-800 text-amber-200'
                                : 'text-wood-300 hover:bg-wood-800 hover:text-amber-100'
                            }}
                        "
                    >
                        Contact
                    </a>


                  

                </nav>


                {{-- ================================================= --}}
                {{-- RIGHT SIDE --}}
                {{-- ================================================= --}}

                <div class="flex items-center gap-2">


                    {{-- ================================================= --}}
                    {{-- AUTHENTICATED USER --}}
                    {{-- ================================================= --}}

                    @auth


                        {{-- CART --}}

                        <a
                            href="{{ route('cart') }}"
                            class="
                                rounded-full
                                border border-wood-700/60
                                bg-wood-900/80
                                p-2.5
                                text-wood-300
                                transition
                                hover:bg-wood-800
                                hover:text-amber-200
                            "
                            title="Keranjang"
                        >

                            <i
                                data-lucide="shopping-bag"
                                class="h-5 w-5"
                            ></i>

                        </a>


                        {{-- ORDERS --}}

                       <a
                            href="{{ route('orders.index') }}"
                            class="
                                hidden
                                items-center
                                gap-2
                                rounded-full
                                border border-wood-700/60
                                bg-wood-900/80
                                px-3
                                py-2
                                text-sm
                                text-wood-300
                                transition
                                hover:bg-wood-800
                                hover:text-amber-200
                                sm:flex
                            "
                        >
                            <i
                                data-lucide="package"
                                class="h-4 w-4"
                            ></i>

                            Orders
                        </a>


                        {{-- USER --}}

                        <div
                            class="
                                ml-2
                                hidden
                                items-center
                                gap-2
                                border-l
                                border-wood-800
                                pl-3
                                sm:flex
                            "
                        >

                            <div
                                class="
                                    flex
                                    h-9
                                    w-9
                                    items-center
                                    justify-center
                                    rounded-full
                                    border
                                    border-wood-500/50
                                    bg-wood-700
                                "
                            >

                                <i
                                    data-lucide="user"
                                    class="h-4 w-4 text-amber-200"
                                ></i>

                            </div>


                            <div class="hidden lg:block">

                                <p
                                    class="
                                        text-xs
                                        font-semibold
                                        text-wood-100
                                    "
                                >
                                    {{ auth()->user()->name }}
                                </p>

                                <p class="text-[10px] text-wood-500">

                                    {{ auth()->user()->role === 'admin'
                                        ? 'Administrator'
                                        : 'Customer'
                                    }}

                                </p>

                            </div>

                        </div>


                        {{-- LOGOUT --}}

                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                            class="ml-1"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="
                                    rounded-full
                                    p-2.5
                                    text-wood-400
                                    transition
                                    hover:bg-red-500/10
                                    hover:text-red-400
                                "
                                title="Logout"
                            >

                                <i
                                    data-lucide="log-out"
                                    class="h-5 w-5"
                                ></i>

                            </button>

                        </form>


                    {{-- ================================================= --}}
                    {{-- GUEST --}}
                    {{-- ================================================= --}}

                    @else


                        {{-- LOGIN ONLY --}}

                        <a
                            href="{{ route('login') }}"
                            class="
                                inline-flex
                                items-center
                                gap-2
                                rounded-full
                                bg-gradient-to-br
                                from-terracotta-400
                                to-terracotta-600
                                px-5
                                py-2.5
                                text-sm
                                font-semibold
                                text-white
                                shadow-lg
                                shadow-terracotta-600/20
                                transition
                                hover:scale-[1.02]
                                hover:shadow-terracotta-600/30
                            "
                        >

                            <i
                                data-lucide="log-in"
                                class="h-4 w-4"
                            ></i>

                            Login

                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </header>


    {{-- ========================================================= --}}
    {{-- FLASH MESSAGE --}}
    {{-- ========================================================= --}}

    <div class="mx-auto max-w-7xl px-5 pt-5 lg:px-8">


        {{-- SUCCESS --}}

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

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- ERROR --}}

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

                <span>
                    {{ session('error') }}
                </span>

            </div>

        @endif

    </div>


    {{-- ========================================================= --}}
    {{-- PAGE CONTENT --}}
    {{-- ========================================================= --}}

    <main>

        @yield('content')

    </main>


    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <footer class="mt-16 border-t border-wood-800/80">

        <div class="mx-auto max-w-7xl px-5 py-10 lg:px-8">

            <div
                class="
                    flex
                    flex-col
                    items-center
                    justify-between
                    gap-4
                    md:flex-row
                "
            >


                {{-- BRAND --}}

                <div class="text-center md:text-left">

                    <p
                        class="
                            font-serif
                            text-lg
                            text-amber-100
                        "
                    >
                        BookStore
                    </p>

                    <p
                        class="
                            mt-1
                            text-xs
                            text-wood-500
                        "
                    >
                        A cozy place to find your next story.
                    </p>

                </div>
<div>
   

    {{-- Social Media --}}
  <div class="mt-5 flex items-center gap-3">

    {{-- Instagram --}}
    <a
        href="https://www.instagram.com/diarynoctanibal/"
        target="_blank"
        rel="noopener noreferrer"
        class="flex h-9 w-9 items-center justify-center rounded-full border border-[#67422b]/60 bg-[#2a1a12] text-[#dfc2a6] transition duration-300 hover:-translate-y-1 hover:border-[#e57a53] hover:bg-[#382216] hover:text-[#e57a53]"
        title="Instagram"
    >
        <i class="fa-brands fa-instagram text-base"></i>
    </a>

    {{-- LinkedIn --}}
    <a
        href="www.linkedin.com/in/nabil-radika/"
        target="_blank"
        rel="noopener noreferrer"
        class="flex h-9 w-9 items-center justify-center rounded-full border border-[#67422b]/60 bg-[#2a1a12] text-[#dfc2a6] transition duration-300 hover:-translate-y-1 hover:border-[#e57a53] hover:bg-[#382216] hover:text-[#e57a53]"
        title="LinkedIn"
    >
        <i class="fa-brands fa-linkedin-in text-base"></i>
    </a>

    {{-- Facebook --}}
    <a
        href="https://www.facebook.com/nabilradika.aprianor/"
        target="_blank"
        rel="noopener noreferrer"
        class="flex h-9 w-9 items-center justify-center rounded-full border border-[#67422b]/60 bg-[#2a1a12] text-[#dfc2a6] transition duration-300 hover:-translate-y-1 hover:border-[#e57a53] hover:bg-[#382216] hover:text-[#e57a53]"
        title="Facebook"
    >
        <i class="fa-brands fa-facebook-f text-base"></i>
    </a>

</div>
</div>  

                {{-- COPYRIGHT --}}

                <p class="text-xs text-wood-600">

                    © {{ date('Y') }}

                    BookStore.

                    All rights reserved.

                </p>

            </div>

        </div>

    </footer>


    {{-- ========================================================= --}}
    {{-- JAVASCRIPT --}}
    {{-- ========================================================= --}}

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

</body>

</html>