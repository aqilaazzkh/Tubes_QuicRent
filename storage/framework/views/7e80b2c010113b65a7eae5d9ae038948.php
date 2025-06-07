<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna - QuickRent</title>
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
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.home')); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.vehicles.index')); ?>">Mobil</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.motors.index')); ?>">Motor</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.pemesanan.index')); ?>">Pemesanan</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Pengguna</a></li>
                <li class="nav-item">
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Pengguna</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success text-center">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped shadow-sm bg-white">
                <thead class="table-info">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="text-center align-middle">
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <span class="badge bg-<?php echo e($user->role === 'admin' ? 'primary' : 'secondary'); ?>">
                                    <?php echo e(ucfirst($user->role)); ?>

                                </span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data pengguna.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\qila\Laravel\quickrent3\resources\views/admin/Pengguna/Data.blade.php ENDPATH**/ ?>