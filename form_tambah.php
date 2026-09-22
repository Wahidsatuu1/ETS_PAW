<?php
include 'koneksi.php';
/** @var mysqli $koneksi */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa Baru 2026 - UNTAG Surabaya</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="background-overlay"></div>

<div class="main-wrapper">
    <!-- TOP NAVIGATION & BRANDING DENGAN TOMBOL KEMBALI KE DATA MAHASISWA BARU -->
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
                <a href="data_mahasiswa.php" class="btn btn-secondary btn-sm" style="background: rgba(255,255,255,0.15); color: #fff; border: 1px solid rgba(255,255,255,0.3);">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Data Mahasiswa Baru
                </a>
            </nav>
        </div>
    </header>

    <!-- CONTENT AREA DENGAN SPLIT LAYOUT (FORM DI KIRI & GAMBAR UNTAG 2026 DI KANAN) -->
    <main class="content-area">
        <div class="form-split-wrapper">
            
            <!-- KOLOM KIRI: FORMULIR PENDAFTARAN -->
            <div class="form-split-main">
                <div class="form-card" style="max-width: 100%; margin: 0;">
                    
                    <div class="form-header-badge">
                        <i class="fa-solid fa-file-signature"></i> Formulir PMB Online 2026
                    </div>
                    
                    <h1 class="form-title">Pendaftaran Calon Mahasiswa Baru</h1>
                    <p class="form-subtitle">Lengkapi formulir di bawah ini dengan data yang benar dan valid untuk seleksi penerimaan mahasiswa baru tahun akademik 2026/2027.</p>

                    <form method="post" action="proses_tambah.php" id="formPendaftaran">
                        
                        <!-- SEKSI 1: DATA AKADEMIK -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="fa-solid fa-graduation-cap"></i> 1. Informasi Pilihan Akademik Untag 2026
                            </div>
                            
                            <div class="form-grid-3">
                                <div class="form-group">
                                    <label for="nbi">Nomor Berkas / NBI Calon <span class="required">*</span></label>
                                    <input type="text" id="nbi" name="nbi" placeholder="Contoh: 146260005" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="jurusan">Pilihan Program Studi <span class="required">*</span></label>
                                    <input type="text" id="jurusan" name="jurusan" list="listJurusan" placeholder="Pilih atau ketik prodi..." required autocomplete="off">
                                    <datalist id="listJurusan">
                                        <option value="Teknik Informatika">
                                        <option value="Sistem Informasi">
                                        <option value="Teknik Industri">
                                        <option value="Teknik Sipil">
                                        <option value="Teknik Mesin">
                                        <option value="Teknik Elektro">
                                        <option value="Arsitektur">
                                        <option value="Ilmu Hukum">
                                        <option value="Ilmu Komunikasi">
                                        <option value="Administrasi Publik">
                                        <option value="Administrasi Bisnis">
                                        <option value="Manajemen">
                                        <option value="Akuntansi">
                                        <option value="Ekonomi Pembangunan">
                                        <option value="Psikologi">
                                        <option value="Sastra Inggris">
                                        <option value="Sastra Jepang">
                                    </datalist>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_masuk">Tahun Masuk / Angkatan <span class="required">*</span></label>
                                    <input type="number" id="tahun_masuk" name="tahun_masuk" min="2020" max="2035" value="2026" required>
                                </div>
                            </div>
                        </div>

                        <!-- SEKSI 2: IDENTITAS MAHASISWA -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="fa-solid fa-user"></i> 2. Identitas Pribadi Calon Mahasiswa
                            </div>

                            <div class="form-grid-2">
                                <div class="form-group col-full">
                                    <label for="nama_lengkap">Nama Lengkap Sesuai Ijazah/KTP <span class="required">*</span></label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap tanpa singkatan" required>
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Kota / Kabupaten Lahir">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select id="agama" name="agama">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- SEKSI 3: DOMISILI & KONTAK -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="fa-solid fa-location-dot"></i> 3. Domisili & Kontak Mahasiswa
                            </div>

                            <div class="form-grid-2">
                                <div class="form-group col-full">
                                    <label for="alamat">Alamat Tempat Tinggal Lengkap</label>
                                    <textarea id="alamat" name="alamat" placeholder="Jalan, No. Rumah, RT/RW, Kelurahan, Kecamatan..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" id="provinsi" name="provinsi" placeholder="Contoh: Jawa Timur">
                                </div>

                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten / Kota</label>
                                    <input type="text" id="kabupaten" name="kabupaten" placeholder="Contoh: Surabaya">
                                </div>

                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" id="kode_pos" name="kode_pos" placeholder="Contoh: 60118">
                                </div>

                                <div class="form-group">
                                    <label for="telepon">No. Telepon / WhatsApp Aktif</label>
                                    <input type="tel" id="telepon" name="telepon" placeholder="Contoh: 081234567890">
                                </div>

                                <div class="form-group col-full">
                                    <label for="email">Alamat Email Aktif</label>
                                    <input type="email" id="email" name="email" placeholder="Contoh: nama@domain.com">
                                </div>
                            </div>
                        </div>

                        <!-- SEKSI 4: DATA ORANG TUA / WALI -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="fa-solid fa-people-roof"></i> 4. Data Orang Tua / Wali
                            </div>

                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Lengkap Ayah</label>
                                    <input type="text" id="nama_ayah" name="nama_ayah" placeholder="Nama ayah kandung / wali">
                                </div>

                                <div class="form-group">
                                    <label for="nama_ibu">Nama Lengkap Ibu</label>
                                    <input type="text" id="nama_ibu" name="nama_ibu" placeholder="Nama ibu kandung">
                                </div>
                            </div>
                        </div>

                        <!-- ACTION BUTTONS -->
                        <div class="form-actions">
                            <a href="data_mahasiswa.php" class="btn btn-secondary">
                                <i class="fa-solid fa-arrow-left"></i> Kembali ke Data Mahasiswa
                            </a>
                            <button type="submit" class="btn btn-primary" id="btnSubmit">
                                <i class="fa-solid fa-paper-plane"></i> Simpan Pendaftaran
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- KOLOM KANAN: GAMBAR & SHOWCASE UNTAG 2026 -->
            <div class="form-split-sidebar">
                <div class="sidebar-image-card">
                    <div class="sidebar-image-container">
                        <img src="images/untag_2026.jpg" alt="Monumen Untag Surabaya 2026" class="untag-sidebar-img">
                        <div class="image-gradient-overlay">
                            <span class="badge-untag-pill">PMB UNTAG 2026</span>
                            <h3>Universitas 17 Agustus 1945 Surabaya</h3>
                            <p class="tagline">Kampus Merah Putih &bull; Berintegritas & Unggul</p>
                        </div>
                    </div>
                    
                    <div class="sidebar-info-body">
                        <h4><i class="fa-solid fa-circle-info" style="color: var(--untag-red);"></i> Informasi PMB 2026</h4>
                        <ul class="info-list">
                            <li>
                                <i class="fa-solid fa-check-circle"></i>
                                <span>Penerimaan Mahasiswa Baru Angkatan 2026/2027</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-check-circle"></i>
                                <span>Jalur Reguler, Prestasi Akademik & Beasiswa KIP-K</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-check-circle"></i>
                                <span>Fakultas Teknik, Hukum, Ilmu Sosial, Ekonomi & Psikologi</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-check-circle"></i>
                                <span>Konfirmasi kelulusan berkas otomatis & real-time</span>
                            </li>
                        </ul>
                        
                        <div class="campus-address-box">
                            <i class="fa-solid fa-location-dot"></i>
                            <div>
                                <strong style="color: #0f172a;">Gedung Pusat Informasi PMB UNTAG:</strong>
                                <div>Jl. Semolowaru No. 45, Menur Pumpungan, Sukolilo, Surabaya, Jawa Timur 60118</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="app-footer">
        <div>&copy; 2026 <span>Universitas 17 Agustus 1945 Surabaya</span> &bull; Panitia PMB Kampus Merah Putih</div>
    </footer>
</div>

<script>
// SweetAlert2 notification handling
<?php if (isset($_GET['status'])): ?>
    const status = "<?php echo htmlspecialchars($_GET['status']); ?>";
    if (status === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Pendaftaran Berhasil!',
            text: 'Data calon mahasiswa baru 2026 berhasil disimpan ke database.',
            showCancelButton: true,
            confirmButtonColor: '#BA1A22',
            cancelButtonColor: '#475569',
            confirmButtonText: '<i class="fa-solid fa-list-check"></i> Lihat Data Mahasiswa',
            cancelButtonText: '+ Tambah Lagi'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'data_mahasiswa.php';
            }
        });
    } else if (status === 'error') {
        Swal.fire({
            icon: 'error',
            title: 'Gagal Menyimpan!',
            text: 'Terjadi kesalahan sistem saat menyimpan formulir.',
            confirmButtonColor: '#BA1A22'
        });
    }
<?php endif; ?>
</script>

</body>
</html>