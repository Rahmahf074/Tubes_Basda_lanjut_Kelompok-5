<?php
// Koneksi ke database
include 'config/koneksi.php';

// Ambil 6 produk terbaru
$query = "SELECT * FROM produk ORDER BY created_at DESC LIMIT 6";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SepatuOnline | Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="Gambar/Logo.svg" alt="Logo" width="40" height="40" class="me-2">
            SepatuOnline
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="katalog.php">Katalog</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero text-center">
    <div>
        <h1>Selamat Datang di SepatuOnline</h1>
        <p>Temukan sepatu terbaik untuk gaya dan kenyamanan Anda!</p>
        <a href="katalog.php" class="btn btn-primary mt-3">Lihat Katalog</a>
    </div>
</div>

<!-- Produk Terbaru -->
<div class="container my-5">
    <h2 class="text-center mb-4">Produk Terbaru</h2>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="Gambar/<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['nama']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama']; ?></h5>
                        <p class="card-text">Rp<?= number_format($row['harga'], 0, ',', '.'); ?></p>
                        <p class="card-text"><small><?= $row['kategori']; ?> | <?= $row['brand']; ?> | Ukuran: <?= $row['ukuran']; ?></small></p>
                        <a href="detail_produk.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <small>&copy; <?= date("Y") ?> SepatuOnline - Sistem Pemesanan Sepatu</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
