<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact - BookStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            color: #212529;
        }

        .navbar {
            background: #111827;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: .5px;
        }

        .contact-hero {
            background: #111827;
            color: white;
            padding: 70px 20px;
        }

        .contact-hero h1 {
            font-size: 44px;
            font-weight: 700;
        }

        .contact-hero p {
            color: #d1d5db;
        }

        .contact-section {
            padding: 70px 20px;
        }

        .contact-card {
            background: white;
            border: none;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, .06);
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 .2rem rgba(17, 24, 39, .12);
            border-color: #111827;
        }

        .btn-submit {
            background: #111827;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
        }

        .btn-submit:hover {
            background: #1f2937;
            color: white;
        }

        .contact-info {
            background: #111827;
            color: white;
            border-radius: 18px;
            padding: 35px;
            height: 100%;
        }

        .contact-info p {
            color: #d1d5db;
        }

        footer {
            background: #111827;
            color: #9ca3af;
            padding: 25px 0;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            BookStore
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">
                        About Us
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>

                @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">
                            Cart
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">
                            Orders
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button class="btn btn-outline-light btn-sm">
                                Logout
                            </button>

                        </form>

                    </li>

                @else

                    <li class="nav-item ms-lg-2">

                        <a href="{{ route('login') }}"
                           class="btn btn-light btn-sm px-3">

                            Login

                        </a>

                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>


<section class="contact-hero">

    <div class="container text-center">

        <h1>Contact Us</h1>

        <p class="mt-3 mb-0">
            Punya pertanyaan atau ingin menyampaikan pesan?
            Hubungi kami melalui form di bawah.
        </p>

    </div>

</section>


<section class="contact-section">

    <div class="container">

        <div class="row g-4 justify-content-center">

            <div class="col-lg-4">

                <div class="contact-info">

                    <h3 class="fw-bold mb-4">
                        Hubungi Kami
                    </h3>

                    <p>
                        Silakan kirimkan pertanyaan, masukan,
                        atau pesan yang ingin kamu sampaikan
                        kepada administrator BookStore.
                    </p>

                    <hr class="border-secondary my-4">

                    <div class="mb-4">

                        <h6 class="fw-bold">
                            📧 Email
                        </h6>

                        <p class="mb-0">
                            admin@bookstore.test
                        </p>

                    </div>

                    <div class="mb-4">

                        <h6 class="fw-bold">
                            📍 Lokasi
                        </h6>

                        <p class="mb-0">
                            Malang, Jawa Timur
                        </p>

                    </div>

                    <div>

                        <h6 class="fw-bold">
                            💬 Response
                        </h6>

                        <p class="mb-0">
                            Pesan akan diterima oleh administrator
                            BookStore.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-7">

                <div class="contact-card">

                    <h3 class="fw-bold mb-2">
                        Kirim Pesan
                    </h3>

                    <p class="text-secondary mb-4">
                        Isi form berikut untuk menghubungi admin.
                    </p>


                    @if(session('success'))

                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif


                    @if(session('error'))

                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>

                    @endif


                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form action="{{ route('contact.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nama
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', auth()->user()->name) }}"
                                placeholder="Masukkan nama"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', auth()->user()->email) }}"
                                placeholder="Masukkan email"
                                required
                            >

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Pesan
                            </label>

                            <textarea
                                name="message"
                                class="form-control"
                                rows="6"
                                placeholder="Tuliskan pesan kamu..."
                                required
                            >{{ old('message') }}</textarea>

                        </div>


                        <button type="submit" class="btn-submit">
                            Kirim Pesan
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


<footer>

    <div class="container text-center">

        <small>
            © {{ date('Y') }} BookStore. All rights reserved.
        </small>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>