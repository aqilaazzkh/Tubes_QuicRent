<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan - QuickRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Kendaraan</h1>

    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST" class="shadow-sm bg-white p-4 rounded" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kendaraan" class="form-label">Nama Kendaraan</label>
            <input type="text" name="nama_kendaraan" id="nama_kendaraan" class="form-control" value="{{ old('nama_kendaraan', $vehicle->nama_kendaraan) }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga per Hari</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $vehicle->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Kendaraan (opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            @if ($vehicle->gambar)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $vehicle->gambar) }}" width="100" alt="Gambar {{ $vehicle->nama_kendaraan }}">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary w-100">Update Kendaraan</button>
    </form>

    <div class="mt-3 text-center">
        <a href="{{ route('admin.vehicles.index') }}" class="btn btn-outline-secondary">← Kembali ke Daftar Kendaraan</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
