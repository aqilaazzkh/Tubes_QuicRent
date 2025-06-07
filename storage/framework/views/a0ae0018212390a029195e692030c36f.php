<!DOCTYPE html>
<html>

<head>
    <title>Tambah Kendaraan - QuickRent</title>
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
        <h1>Tambah Kendaraan</h1>

        <?php if($errors->any()): ?>
            <div class="error">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div
                style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 6px; margin-bottom: 20px; text-align: center;">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>


        <form method="POST" action="<?php echo e(route('vehicles.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <label>Nama Kendaraan</label>
            <input type="text" name="nama_kendaraan" value="<?php echo e(old('nama_kendaraan')); ?>" required>

            <label>Harga Per Hari</label>
            <input type="number" name="harga" value="<?php echo e(old('harga')); ?>" required>

            <label>Gambar</label>
            <input type="file" name="gambar" required>

            <button type="submit">Simpan Kendaraan</button>
        </form>

        <a class="back-link" href="<?php echo e(route('vehicles.index')); ?>">← Kembali ke Daftar Kendaraan</a>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\qila\Laravel\quickrent3\resources\views/admin/MobilCreate.blade.php ENDPATH**/ ?>