<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan - QuickRent</title>
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
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.home')); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.vehicles.index')); ?>">Mobil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.motors.index')); ?>">Motor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo e(route('admin.pemesanan.index')); ?>">Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.pengguna.index')); ?>">Pengguna</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
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
        <h1 class="text-center mb-4">Daftar Pemesanan</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success text-center">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped shadow-sm bg-white">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nama Penyewa</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal Rental</th>
                        <th>Tanggal Kembali</th>
                        <th>Kendaraan</th>
                        <th>Harga</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $rentals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="text-center align-middle">
                            <td><?php echo e($rental->id); ?></td>
                            <td><?php echo e($rental->nama); ?></td>
                            <td><?php echo e($rental->email); ?></td>
                            <td><?php echo e($rental->telepon); ?></td>
                            <td><?php echo e($rental->alamat ?? '-'); ?></td>
                            <td><?php echo e($rental->tanggal_rental); ?></td>
                            <td><?php echo e($rental->tanggal_kembali); ?></td>
                            <td><?php echo e($rental->nama_kendaraan); ?></td>
                            <td>Rp <?php echo e(number_format($rental->harga, 0, ',', '.')); ?></td>
            
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="11" class="text-center text-muted">Belum ada data pemesanan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\quickrent3\quickrent3\resources\views/admin/Pemesanan/Data.blade.php ENDPATH**/ ?>