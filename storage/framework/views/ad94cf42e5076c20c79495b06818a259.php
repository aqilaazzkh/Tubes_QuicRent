<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Tambah Kendaraan</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

        .section-header i {
            font-size: 1.2rem;
            cursor: pointer;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
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

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #2D4059;
            color: white;
            border-radius: 1rem 1rem 0 0;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .container {
            max-width: 600px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="section-header p-4">
        <h5 class="mb-0 fs-4 fw-bold"><i class="fas fa-car me-2"></i>Form Tambah Kendaraan</h5>
    </div>
    <!-- Notifikasi Berhasil -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Notifikasi Gagal -->
    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-times-circle me-2"></i><?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Validasi Error Laravel -->
    <?php if($errors->any()): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-1">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Form Card -->
    <div class="container my-5">
        <div class="card">
            <div class="card-header p-3">
                Input Data Kendaraan
            </div>
            <div class="card-body p-4">
                <form action="<?php echo e(route('vehicles.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama_kendaraan" class="form-label">Nama Kendaraan</label>
                        <input type="text" id="nama_kendaraan" name="nama_kendaraan" class="form-control"
                            placeholder="Contoh: Yamaha NMAX">
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Sewa</label>
                        <input type="number" id="harga" name="harga" class="form-control" placeholder="Contoh: 150000">
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label">Gambar Kendaraan</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary-custom text-white py-2 shadow-sm">
                            <i class="fas fa-save me-1"></i> Simpan Kendaraan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\qila\Laravel\quickrent3\resources\views/admin/create.blade.php ENDPATH**/ ?>