<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickRent - Rental Mobil & Motor Purwokerto</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body>
    <header>
        <nav class="navbar p-4">
            <div class="logo">
                <h1 class="ms-5">Quick<span>Rent</span></h1>
            </div>
            <ul class="nav-links me-5">
                <li><a class="fs-4" href="#home">Beranda</a></li>
                <li><a class="fs-4" href="#about">Tentang Kami</a></li>
                <li><a class="fs-4" href="#reviews">Ulasan</a></li>
                <li><a class="fs-4" href="#contact">Kontak</a></li>
                
                <?php if(auth()->guard()->guest()): ?>
                    <li><a href="/register" class="auth-link text-black">Daftar</a></li>
                    <li><a href="/login" class="auth-link text-black">Masuk</a></li>
                <?php endif; ?>

                
                <?php if(auth()->guard()->check()): ?>
                    <li>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-link text-black text-decoration-none">Logout</button>
                        </form>
                    </li>
                <?php endif; ?>

            </ul>
        </nav>
    </header>

    <section class="hero text-white bg-dark py-5 position-relative" id="home"
        style="background-image: url('/images/kendaraan1.jpg'); background-size: cover; background-position: center; height: 100vh;">

        <!-- Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(45, 64, 89, 0.6);"></div>

        <!-- Content -->
        <div
            class="container h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative">
            <h1 class="display-5 fw-bold">Temukan solusi transportasi terbaik<br>untuk kebutuhan Anda di Purwokerto <br>
                dengan harga terjangkau dan pelayanan prima</h1>
        </div>
    </section>

    <section class="py-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <!-- Konten Kiri -->
                <div class="col-md-7 custom-text">
                    <h3 class="fw-bold mb-4" style="font-size: 2rem;">
                        Selamat datang di QuickRent - Layanan<br>
                        <span class="text-dark">Rental Mobil & Motor Terpercaya di Purwokerto</span>
                    </h3>
                    <p style="font-size: 1.1rem;">
                        <strong>QuickRent</strong> adalah aplikasi penyedia layanan <em>sewa mobil dan motor</em> di
                        Purwokerto yang dirancang untuk memberikan kemudahan dan fleksibilitas dalam memenuhi kebutuhan
                        transportasi Anda. Dengan QuickRent, Anda dapat dengan mudah menemukan dan menyewa berbagai
                        jenis kendaraan, mulai dari mobil keluarga yang nyaman, SUV tangguh, hingga motor lincah untuk
                        mobilitas perkotaan.
                    </p>
                    <p style="font-size: 1.1rem;">
                        Pilihan kendaraan yang kami sediakan sangat variatif dan harga yang sangat kompetitif di
                        Purwokerto. Kami menawarkan mobil yang cocok untuk Anda seperti: <strong>Honda Brio Satya,
                            Toyota Avanza, Honda HR-V, Toyota Kijang Innova</strong>, serta mobil listrik seperti
                        <strong>Wuling Binguo dan Wuling Air Ev</strong>. Dan untuk motor, kami menawarkan:
                        <strong>Yamaha NMAX Turbo, Honda Vario 125, Yamaha Fazzio, Honda Scoopy Sporty, Yamaha
                            NMAX Turbo, dan Yamaha Grand Filano Hybrid</strong>.
                    </p>
                    <p style="font-size: 1.1rem;">
                        Anda dapat menyewa mobil atau motor untuk harian maupun bulanan dengan supir ataupun tanpa
                        supir.
                        Kami mengutamakan kebersihan dari setiap armada untuk kenyamanan para customer. QuickRent
                        berkomitmen untuk menjadi mitra sewa kendaraan terpercaya bagi Anda.
                    </p>
                </div>

                <!-- Gambar Kanan -->
                <div class="col-md-5 text-center">
                    <img src="/images/image.png" alt="Kunci Mobil" class="img-fluid rounded shadow custom-image">
                </div>
            </div>

            <!-- Logo Merek -->
            <div class="text-center mt-5">
                <h5 class="fw-bold mb-3 " style="font-size: 1.5rem;"><span class="text-shadow-sm">Pilihan Merk Mobil &
                        Motor</span></h5>
                <div class="d-flex justify-content-center align-items-center flex-wrap gap-4">
                    <img src="/images/section/a.png" alt="Honda" style="height: 120px;">
                    <img src="/images/section/b.png" alt="Toyota" style="height: 120px;">
                    <img src="/images/section/c.png" alt="Wuling" style="height: 120px;">
                    <img src="/images/section/d.png" alt="Honda Motor" style="height: 120px;">
                    <img src="/images/section/e.png" alt="Yamaha" style="height: 170px;">
                </div>
            </div>
        </div>
    </section>


    <!-- harga sewa mobil -->
    <section class="py-5 bg-white">
        <div class="container">
            <h3 class="text-center fw-bold mb-3">Daftar Harga Sewa Mobil</h3>
            <p class="text-center fs-5 text-muted mb-5">
                Jelajahi Purwokerto dengan nyaman dan aman menggunakan layanan rental mobil profesional kami. Kami
                menyediakan
                beragam pilihan MPV keluarga yang luas, SUV tangguh untuk berbagai medan, mobil dengan transmisi E-CVT
                yang halus,
                hingga kendaraan EV ramah lingkungan. Nikmati fleksibilitas sewa harian, mingguan, atau bulanan dengan
                opsi sopir
                atau lepas kunci. Dapatkan penawaran harga terbaik sekarang!
            </p>

            <div class="row g-4" style="margin-bottom: 80px;">
                <?php $__currentLoopData = $vehicles->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card shadow-sm rounded-4 bg-light border-0 p-3 text-start h-100">
                            <img src="<?php echo e(asset('storage/' . $vehicle->gambar)); ?>" class="card-img-top mx-auto"
                                style="max-height: 150px; width: auto;" alt="<?php echo e($vehicle->nama_kendaraan); ?>">
                            <div class="card-body">
                                <div class="mb-2 text-warning d-flex align-items-center gap-1">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= round($vehicle->rating ?? 4)): ?> 
                                            <i class="bi bi-star-fill"></i>
                                        <?php else: ?>
                                            <i class="bi bi-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <span class="text-muted ms-1">(<?php echo e($vehicle->reviews ?? 65); ?>)</span>
                                </div>
                                <h6 class="fw-bold"><?php echo e($vehicle->nama_kendaraan); ?></h6>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="fw-bold text-dark fs-5">
                                        Rp<?php echo e(number_format($vehicle->harga, 0, ',', '.')); ?>

                                        <small class="text-muted fw-normal">/Hari</small>
                                    </div>
                                    <a href="<?php echo e(route('mobil.detail', ['id' => $vehicle->id])); ?>"
                                        class="text-success fw-semibold text-decoration-none">
                                        Rental Sekarang <i class="bi bi-arrow-right-short"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


            <!-- Harga Sewa Motor -->
            <section class="py-5 bg-white">
                <div class="container">
                    <h3 class="text-center fw-bold mb-3">Daftar Harga Sewa Motor</h3>
                    <p class="text-center fs-5 text-muted mb-5">
                        Rasakan kebebasan berkendara di Purwokerto dengan layanan rental motor profesional kami. Kami
                        menawarkan
                        pilihan motor matic yang beragam dan terawat, termasuk model turbo yang bertenaga, model yang
                        lincah,
                        model yang stylish, dan model sporty yang trendi. Nikmati fleksibilitas sewa harian. mingguan,
                        atau
                        bulanan dengan harga yang kompetitif. Booking sekarang dan jelajahi Purwokerto!
                    </p>

                    <div class="row g-4" style="margin-bottom: 80px;">
                        <?php $__currentLoopData = $motors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-4 bg-light border-0 p-3 text-start h-100">
                                    <img src="<?php echo e(asset('storage/' . $motor->gambar)); ?>" class="card-img-top mx-auto"
                                        style="max-height: 150px; width: auto;" alt="<?php echo e($motor->nama_kendaraan); ?>">
                                    <div class="card-body">
                                        <div class="mb-2 text-warning d-flex align-items-center gap-1">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <?php if($i <= round($motor->rating ?? 4)): ?> 
                                                    <i class="bi bi-star-fill"></i>
                                                <?php else: ?>
                                                    <i class="bi bi-star"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <span class="text-muted ms-1">(<?php echo e($motor->reviews ?? 65); ?>)</span>
                                        </div>
                                        <h6 class="fw-bold"><?php echo e($motor->nama_kendaraan); ?></h6>
                                        <hr class="my-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="fw-bold text-dark fs-5">
                                                Rp<?php echo e(number_format($motor->harga, 0, ',', '.')); ?>

                                                <small class="text-muted fw-normal">/Hari</small>
                                            </div>
                                            <a href="<?php echo e(route('motor.detail', ['id' => $motor->id])); ?>"
                                                class="text-success fw-semibold text-decoration-none">
                                                Rental Sekarang <i class="bi bi-arrow-right-short"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="row g-4">
                        <!-- Tambahkan lebih banyak kartu jika perlu -->
                    </div>
                </div>
            </section>

            <!-- Testimoni -->
            <section class="bg-light py-5" id="reviews">
                <div class="container">
                    <h3 class="text-center mb-5 fw-bold">Testimoni Pelanggan Kami 💖</h3>

                    <div class="row justify-content-center g-4">
                        <!-- Testimoni 1 -->
                        <div class="col-md-5">
                            <div class="card shadow-sm rounded-4 bg-body-secondary">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <span class="text-warning">★★★★★</span> <strong>5/5</strong>
                                    </div>
                                    <p class="card-text">Sangat puas menyewa disini. Mobilnya bersih dan terawat.</p>
                                    <p class="fw-semibold fst-italic mb-0">Alexius N</p>
                                </div>
                            </div>
                        </div>

                        <!-- Testimoni 2 -->
                        <div class="col-md-5">
                            <div class="card shadow-sm rounded-4 bg-body-secondary">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <span class="text-warning">★★★★★</span> <strong>5/5</strong>
                                    </div>
                                    <p class="card-text">Proses pemesanan mudah dan cepat.</p>
                                    <p class="fw-semibold fst-italic mb-0">Teresa A</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Ulasan -->
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-6">
                            <div class="card shadow-sm rounded-4 bg-body-secondary p-4">
                                
                                <?php if(session('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo e(session('success')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div id="alertPlaceholder"></div>

                                <form id="reviewForm" method="POST" action="<?php echo e(route('reviews.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <h5 class="fw-bold mb-3"><span class="text-warning">★</span> Berikan ulasan Anda
                                    </h5>

                                    <!-- Rating interaktif -->
                                    <div class="mb-3">
                                        <input type="hidden" name="rating" id="rating" value="0">
                                        <div id="star-rating" class="fs-4 text-warning">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <i class="star bi bi-star" data-value="<?php echo e($i); ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <textarea name="message" rows="3" class="form-control"
                                            placeholder="Tulis ulasan Anda di sini..."></textarea>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-dark px-4">Submit</button>
                                    </div>
                                </form>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const stars = document.querySelectorAll('#star-rating .star');
                                        const ratingInput = document.getElementById('rating');

                                        stars.forEach((star) => {
                                            star.addEventListener('click', () => {
                                                const rating = parseInt(star.getAttribute('data-value'));

                                                // Set nilai rating ke input hidden
                                                ratingInput.value = rating;

                                                // Reset semua bintang
                                                stars.forEach((s, index) => {
                                                    if (index < rating) {
                                                        s.classList.remove('bi-star');
                                                        s.classList.add('bi-star-fill');
                                                        s.classList.add('text-warning'); // warna kuning
                                                    } else {
                                                        s.classList.remove('bi-star-fill');
                                                        s.classList.add('bi-star');
                                                        s.classList.remove('text-warning');
                                                    }
                                                });
                                            });

                                            // Tambahan efek hover (opsional)
                                            star.addEventListener('mouseover', () => {
                                                const rating = parseInt(star.getAttribute('data-value'));

                                                stars.forEach((s, index) => {
                                                    if (index < rating) {
                                                        s.classList.add('text-warning');
                                                    } else {
                                                        s.classList.remove('text-warning');
                                                    }
                                                });
                                            });

                                            star.addEventListener('mouseout', () => {
                                                const currentRating = parseInt(ratingInput.value);
                                                stars.forEach((s, index) => {
                                                    if (index < currentRating) {
                                                        s.classList.add('text-warning');
                                                    } else {
                                                        s.classList.remove('text-warning');
                                                    }
                                                });
                                            });
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <footer class="footer-custom text-white p-4 pt-5" id="contact">

                <div class="row gy-4">

                    <!-- QuickRent -->
                    <div class="col-md-4">
                        <h4 class="fw-bold">QuickRent</h4>
                        <p>Kami melayani sewa sesuai dengan opsi kebutuhan Anda yaitu per 12 jam, 24 jam, harian,
                            mingguan,
                            dan bulanan.</p>
                        <p>Menyediakan layanan rental mobil dan motor berkualitas dengan pilihan kendaraan paling hits,
                            harga terjangkau, dan proses pemesanan yang mudah untuk memenuhi kebutuhan transportasi Anda
                            selama di kota ini, kami ahlinya.</p>
                    </div>

                    <!-- Kontak Kami -->
                    <div class="col-md-4">
                        <h4 class="fw-bold">Kontak Kami</h4>
                        <p><strong>Alamat:</strong> Jl. Kauman Lama No.26, Purwokerto Barat, Jawa Tengah</p>
                        <p><strong>Telp:</strong> 0812-9283-9982</p>
                        <p><strong>Email:</strong> quickrent@gm.com</p>

                        <h5 class="fw-bold mt-4">Jam Operasional</h5>
                        <p>Senin - Minggu: 08.00 - 22.00</p>

                        <h5 class="fw-bold mt-3">Sosial Media</h5>
                        <div class="d-flex gap-3">
                            <a href="https://wa.me/6289508847208" target="_blank">
                                <img src="images/whatsapp-icon.png" alt="WhatsApp" width="32" height="32">
                            </a>
                            <a href="https://www.instagram.com/quickrent_" target="_blank">
                                <img src="images/instagram-icon.png" alt="Instagram" width="32" height="32">
                            </a>
                        </div>
                    </div>

                    <!-- Alamat (Map) -->
                    <div class="col-md-4">
                        <h4 class="fw-bold">Alamat</h4>
                        <iframe class="w-100 rounded" height="200"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.649279983177!2d109.23354097584553!3d-7.827653192181254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655efb6df5f47b%3A0xb7a607ff4d88828f!2sJl.%20Kauman%20Lama%20No.26%2C%20Purwokerto%20Bar.%2C%20Kabupaten%20Banyumas!5e0!3m2!1sid!2sid!4v1714458121123!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="text-center pt-4 border-top mt-4">
                    <small>© 2025 QuickRent. All rights reserved.</small>
                </div>

            </footer>
            <!-- Bootstrap JS Bundle -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body><?php /**PATH C:\xampp\htdocs\qila\Laravel\quickrent3\resources\views/home.blade.php ENDPATH**/ ?>