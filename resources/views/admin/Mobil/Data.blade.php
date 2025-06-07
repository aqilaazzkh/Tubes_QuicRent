<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kendaraan - QuickRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">QuickRent Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> <!-- ms-auto untuk align kanan -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.vehicles.index') }}">Mobil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.motors.index') }}">Motor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.pemesanan.index') }}">Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.pengguna.index') }}">Pengguna</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Kendaraan Mobil</h1>

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.vehicles.create') }}" class="btn btn-success">Tambah Kendaraan Baru</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped shadow-sm bg-white">
                <thead class="table-success">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nama Kendaraan</th>
                        <th>Harga per Hari</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vehicles as $index => $vehicle)
                        <tr class="text-center align-middle">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $vehicle->nama_kendaraan }}</td>
                            <td>Rp {{ number_format($vehicle->harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($vehicle->gambar)
                                    <img src="{{ asset('storage/' . $vehicle->gambar) }}" width="80"
                                        alt="Gambar {{ $vehicle->nama_kendaraan }}">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Yakin ingin menghapus kendaraan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data kendaraan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>