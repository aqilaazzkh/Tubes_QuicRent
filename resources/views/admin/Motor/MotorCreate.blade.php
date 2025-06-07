<!DOCTYPE html>
<html>

<head>
    <title>Tambah Motor - QuickRent</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 40px;
        }

        .container {
            background-color: white;
            max-width: 500px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 25px;
            width: 100%;
            background-color: #1d4ed8;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2563eb;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #1d4ed8;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Motor</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div
                style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 6px; margin-bottom: 20px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.motors.store') }}" enctype="multipart/form-data">
            @csrf

            <label>Nama Motor</label>
            <input type="text" name="nama_kendaraan" value="{{ old('nama_kendaraan') }}" required>

            <label>Harga Per Hari</label>
            <input type="number" name="harga" value="{{ old('harga') }}" required>

            <label>Gambar</label>
            <input type="file" name="gambar" required>

            <button type="submit">Simpan Motor</button>
        </form>

        <a class="back-link" href="{{ route('admin.motors.index') }}">← Kembali ke Daftar Motor</a>
    </div>
</body>

</html>
