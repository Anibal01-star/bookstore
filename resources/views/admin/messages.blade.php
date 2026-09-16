<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesan Contact Admin - BookStore</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Pesan Contact Admin</h2>
            <p class="text-muted mb-0">
                Daftar pesan yang dikirim oleh pengguna BookStore
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-dark">
            Kembali ke Dashboard
        </a>
    </div>


    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- Card --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($messages as $message)

                        <tr>

                            {{-- Nomor --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- Nama --}}
                            <td>
                                <strong>
                                    {{ $message->name }}
                                </strong>
                            </td>


                            {{-- Email --}}
                            <td>
                                <a href="mailto:{{ $message->email }}"
                                   class="text-decoration-none">
                                    {{ $message->email }}
                                </a>
                            </td>


                            {{-- Pesan --}}
                            <td style="min-width: 300px;">
                                {{ $message->message }}
                            </td>


                            {{-- Tanggal --}}
                            <td>
                                {{ $message->created_at->format('d M Y H:i') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5"
                                class="text-center text-muted py-5">

                                <div class="mb-2">
                                    <strong>Belum ada pesan</strong>
                                </div>

                                <small>
                                    Pesan dari pengguna akan muncul di halaman ini.
                                </small>

                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

</body>
</html>