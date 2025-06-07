<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Pemesanan Kendaraan Motor</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .section-header {
            background-color: #2D4059;
            color: white;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .bike-image img {
            max-width: 100%;
            border-radius: 0.75rem;
        }

        .vehicle-details h4 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .vehicle-specs {
            font-size: 0.95rem;
            color: #6c757d;
        }

        .vehicle-specs i {
            margin-right: 0.4rem;
        }

        .rental-form .form-label {
            font-weight: 500;
        }

        .form-detail-control {
            border: 1.5px solid #2D4059 !important;
            border-radius: 0.5rem;
        }

        .btn-primary-custom {
            background-color: #2D4059;
            border: none;
            border-radius: 2rem;
        }

        .btn-primary-custom:hover {
            background-color: #1f2d42;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="section-header p-4">
        <h5 class="mb-0 fs-4 fw-bold">
            Form Pemesanan Kendaraan Motor
        </h5>
    </div>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row align-items-start gy-4">
            <!-- Gambar Motor -->
            <div class="col-lg-5 text-center bike-image">
                <img src="{{ asset('storage/' . $motor->gambar) }}" alt="{{ $motor->nama_kendaraan }}"
                    style="width: 100%; max-width: 400px; height: auto;" />
            </div>

            <!-- Detail dan Form -->
            <div class="col-lg-7">
                <div class="vehicle-details mb-3">
                    <h4 class="fw-bold">{{ $motor->nama_kendaraan }}</h4>
                    <div class="vehicle-specs">
                        <i class="fas fa-user-friends"></i> 2
                        <i class="fas fa-calendar-alt ms-3"></i> 2023
                        <i class="fas fa-motorcycle ms-3"></i> CVT
                        <i>RP {{ number_format($motor->harga, 0, ',', '.') }}</i>
                    </div>
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


                <!-- Formulir -->
                <form id="rental-form" method="POST" action="{{ route('rent.motor') }}" class="rental-form">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap"
                            required />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email aktif"
                            required />
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="08xxxxxxxxxx"
                            required />
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Pengiriman</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="2"
                            placeholder="Kosongkan jika motor dijemput (opsional)"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_rental" class="form-label">Tanggal Rental</label>
                            <input type="date" class="form-control" id="tanggal_rental" name="tanggal_rental"
                                required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"
                                required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan Tambahan</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="4"
                            placeholder="Keterangan tambahan (opsional)"></textarea>
                    </div>

                    <!-- Hidden Inputs -->
                    <input type="hidden" id="motor_id" name="motor_id" value="{{ $motor->id }}" />
                    {{-- order_id akan diisi setelah generate snap token --}}

                    <!-- Tombol Pembayaran -->
                    <div class="d-grid">
                        <button type="submit" id="" class="btn btn-primary text-white py-2 shadow-sm">
                            Rental Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>