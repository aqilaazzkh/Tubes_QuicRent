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

    <?php if(session('error')): ?>
        <div class="alert alert-danger text-center">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.vehicles.update', $vehicle->id)); ?>" method="POST" class="shadow-sm bg-white p-4 rounded" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="nama_kendaraan" class="form-label">Nama Kendaraan</label>
            <input type="text" name="nama_kendaraan" id="nama_kendaraan" class="form-control" value="<?php echo e(old('nama_kendaraan', $vehicle->nama_kendaraan)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga per Hari</label>
            <input type="number" name="harga" id="harga" class="form-control" value="<?php echo e(old('harga', $vehicle->harga)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Kendaraan (opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            <?php if($vehicle->gambar): ?>
                <div class="mt-2">
                    <img src="<?php echo e(asset('storage/' . $vehicle->gambar)); ?>" width="100" alt="Gambar <?php echo e($vehicle->nama_kendaraan); ?>">
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary w-100">Update Kendaraan</button>
    </form>

    <div class="mt-3 text-center">
        <a href="<?php echo e(route('admin.vehicles.index')); ?>" class="btn btn-outline-secondary">← Kembali ke Daftar Kendaraan</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\qila\Laravel\quickrent3\resources\views/admin/Mobil/Edit.blade.php ENDPATH**/ ?>