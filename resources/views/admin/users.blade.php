<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data User - BookStore</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Data User</h2>
            <p class="text-muted mb-0">
                Daftar pengguna yang terdaftar di BookStore
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-dark">
            Kembali ke Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Terdaftar</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($users as $user)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>
                                    {{ $user->name }}
                                </strong>
                            </td>

                            <td>
                                {{ $user->email }}
                            </td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $user->role }}
                                </span>
                            </td>

                            <td>
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5"
                                class="text-center text-muted py-4">
                                Belum ada user yang terdaftar.
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