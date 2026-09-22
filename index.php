<?php
include 'koneksi.php';
/** @var mysqli $koneksi */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMB UNTAG Surabaya 2026 - Universitas 17 Agustus 1945 Surabaya</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="background-overlay"></div>

<div class="main-wrapper">
    <!-- TOP NAVIGATION -->
    <header class="top-navbar">
        <div class="nav-container">
            <a href="index.php" class="brand-section">
                <div class="brand-logo-badge">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div class="brand-info">
                    <div class="brand-title">
                        UNTAG SURABAYA
                        <span class="brand-tag-year">PMB 2026</span>
                    </div>
                    <div class="brand-subtitle">Universitas 17 Agustus 1945 &bull; Kampus Merah Putih</div>
                </div>
            </a>
            
            <nav class="nav-actions">
                <a href="data_mahasiswa.php" class="nav-link">
                    <i class="fa-solid fa-table-list"></i> Data Mahasiswa
                </a>
            </nav>
        </div>
    </header>

    <!-- MAIN HERO PORTAL -->
    <main class="hero-portal-container">
        <div class="hero-welcome-card">
            
            <!-- LOGO UNTAG SURABAYA DI TENGAH (TRANSPARAN) -->
            <div class="hero-logo-wrapper">
                <img src="images/logo_untag.png?v=2" alt="Logo Universitas 17 Agustus 1945 Surabaya" class="hero-logo-img">
            </div>

            <!-- BADGE & JUDUL -->
            <div class="hero-badge-pill">
                <i class="fa-solid fa-bullhorn"></i> PMB UNTAG SURABAYA 2026
            </div>

            <h1 class="hero-title">UNIVERSITAS 17 AGUSTUS 1945 SURABAYA</h1>
            
            <p class="hero-subtitle">
                Selamat datang di Portal Resmi Penerimaan Mahasiswa Baru Tahun Akademik 2026/2027. 
                Wujudkan cita-cita dan masa depan gemilang bersama Kampus Merah Putih yang berintegritas dan terakreditasi Unggul.
            </p>

            <!-- TOMBOL UTAMA & KEDUA -->
            <div class="hero-actions-group">
                <a href="form_tambah.php" class="btn-hero-cta">
                    <i class="fa-solid fa-user-plus"></i> Pendaftaran Calon Mahasiswa Baru 2026
                </a>
                
                <a href="data_mahasiswa.php" class="btn-hero-secondary">
                    <i class="fa-solid fa-table-list"></i> Lihat Data Rekap Mahasiswa Baru
                </a>
            </div>

            <!-- HIGHLIGHTS / KEUNGGULAN -->
            <div class="hero-highlights-strip">
                <div class="highlight-item">
                    <i class="fa-solid fa-award"></i> Terakreditasi Unggul
                </div>
                <div class="highlight-item">
                    <i class="fa-solid fa-building-columns"></i> 16+ Program Studi Pilihan
                </div>
                <div class="highlight-item">
                    <i class="fa-solid fa-location-dot"></i> Kampus Semolowaru Surabaya
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="app-footer">
        <div>&copy; 2026 <span>Universitas 17 Agustus 1945 Surabaya</span> &bull; Panitia PMB Kampus Merah Putih</div>
    </footer>
</div>

</body>
</html>