<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">QuickRent Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.vehicles.index') }}">Mobil</a>
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

    <!-- Main Content -->
    <main class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="text-center">
            <h1 class="display-4">Selamat Datang di Dashboard Admin</h1>
            <p class="lead">Kelola data kendaraan, pemesanan, pengguna, dan lainnya dari satu tempat.</p>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>