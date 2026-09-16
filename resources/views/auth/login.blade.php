<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BookStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            width: 100%;
            max-width: 430px;
            background: white;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        .brand {
            font-weight: 700;
            font-size: 28px;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <div class="text-center mb-4">
        <div class="brand">BookStore</div>
        <p class="text-muted mb-0">Masuk ke akun Anda</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>
    </form>

    <div class="text-center mt-4">
        <span class="text-muted">Belum punya akun?</span>
        <a href="{{ route('register') }}">Daftar sekarang</a>
    </div>

</div>

</body>
</html>