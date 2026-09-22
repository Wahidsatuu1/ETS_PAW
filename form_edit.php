<?php
include 'koneksi.php';
/** @var mysqli $koneksi */

// PROSES UPDATE DATA
if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $nbi = $_POST['nbi'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kabupaten = $_POST['kabupaten'];
    $kode_pos = $_POST['kode_pos'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $jurusan = $_POST['jurusan'];
    $tahun_masuk = (int)$_POST['tahun_masuk'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $agama = $_POST['agama'];

    $sql_update = "UPDATE mahasiswa_baru SET 
                    nbi = '$nbi', 
                    nama_lengkap = '$nama_lengkap', 
                    tempat_lahir = '$tempat_lahir',
                    tanggal_lahir = '$tanggal_lahir',
                    jenis_kelamin = '$jenis_kelamin',
                    alamat = '$alamat',
                    provinsi = '$provinsi',
                    kabupaten = '$kabupaten',
                    kode_pos = '$kode_pos',
                    email = '$email', 
                    telepon = '$telepon',
                    jurusan = '$jurusan', 
                    tahun_masuk = '$tahun_masuk',
                    nama_ayah = '$nama_ayah',
                    nama_ibu = '$nama_ibu',
                    agama = '$agama'
                  WHERE id = $id";

    if (mysqli_query($koneksi, $sql_update)) {
        header("Location: data_mahasiswa.php?status=updated");
    } else {
        header("Location: data_mahasiswa.php?status=error");
    }
    exit;
}

// MENGAMBIL DATA UNTUK FORM EDIT
if (!isset($_GET['id'])) {
    header("Location: data_mahasiswa.php");
    exit;
}
$id = (int)$_GET['id'];

$sql_select = "SELECT * FROM mahasiswa_baru WHERE id = $id";
$data = mysqli_query($koneksi, $sql_select);
$row = mysqli_fetch_assoc($data);

if (!$row) {
    header("Location: data_mahasiswa.php?status=error");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa - PMB UNTAG Surabaya 2026</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="background-overlay"></div>

<div class="main-wrapper">
    <!-- TOP NAVIGATION & BRANDING -->
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
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Data Mahasiswa
                </a>
            </nav>
        </div>
    </header>

    <!-- CONTENT AREA -->
    <main class="content-area">
        <div class="form-card">
            
            <div class="form-header-badge" style="background: #fef3c7; color: #b45309;">
                <i class="fa-solid fa-user-pen"></i> Pembaruan Biodata Mahasiswa
            </div>
            
            <h1 class="form-title">Edit Data Mahasiswa</h1>
            <p class="form-subtitle">Perbarui data profil, akademik, kontak, atau informasi orang tua calon mahasiswa berikut.</p>

            <form method="post" action="form_edit.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
                <!-- SEKSI 1: DATA AKADEMIK -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fa-solid fa-graduation-cap"></i> 1. Informasi Pilihan Akademik Untag 2026
                    </div>
                    
                    <div class="form-grid-3">
                        <div class="form-group">
                            <label for="nbi">Nomor Berkas / NBI Calon <span class="required">*</span></label>
                            <input type="text" id="nbi" name="nbi" value="<?php echo htmlspecialchars($row['nbi']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="jurusan">Program Studi / Jurusan <span class="required">*</span></label>
                            <input type="text" id="jurusan" name="jurusan" list="listJurusan" value="<?php echo htmlspecialchars($row['jurusan']); ?>" required>
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
                            <input type="number" id="tahun_masuk" name="tahun_masuk" min="2020" max="2035" value="<?php echo htmlspecialchars($row['tahun_masuk']); ?>" required>
                        </div>
                    </div>
                </div>

                <!-- SEKSI 2: IDENTITAS MAHASISWA -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fa-solid fa-user"></i> 2. Identitas Pribadi Mahasiswa
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group col-full">
                            <label for="nama_lengkap">Nama Lengkap Sesuai Ijazah/KTP <span class="required">*</span></label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo htmlspecialchars($row['nama_lengkap']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo htmlspecialchars($row['tempat_lahir']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo htmlspecialchars($row['tanggal_lahir']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Laki-laki" <?php if($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php if($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select id="agama" name="agama">
                                <option value="Islam" <?php if($row['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                                <option value="Kristen Protestan" <?php if($row['agama'] == 'Kristen Protestan') echo 'selected'; ?>>Kristen Protestan</option>
                                <option value="Katolik" <?php if($row['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
                                <option value="Hindu" <?php if($row['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                                <option value="Buddha" <?php if($row['agama'] == 'Buddha') echo 'selected'; ?>>Buddha</option>
                                <option value="Khonghucu" <?php if($row['agama'] == 'Khonghucu') echo 'selected'; ?>>Khonghucu</option>
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
                            <textarea id="alamat" name="alamat"><?php echo htmlspecialchars($row['alamat']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" id="provinsi" name="provinsi" value="<?php echo htmlspecialchars($row['provinsi']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="kabupaten">Kabupaten / Kota</label>
                            <input type="text" id="kabupaten" name="kabupaten" value="<?php echo htmlspecialchars($row['kabupaten']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" id="kode_pos" name="kode_pos" value="<?php echo htmlspecialchars($row['kode_pos']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="telepon">No. Telepon / WhatsApp Aktif</label>
                            <input type="tel" id="telepon" name="telepon" value="<?php echo htmlspecialchars($row['telepon']); ?>">
                        </div>

                        <div class="form-group col-full">
                            <label for="email">Alamat Email Aktif</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
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
                            <input type="text" id="nama_ayah" name="nama_ayah" value="<?php echo htmlspecialchars($row['nama_ayah']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="nama_ibu">Nama Lengkap Ibu</label>
                            <input type="text" id="nama_ibu" name="nama_ibu" value="<?php echo htmlspecialchars($row['nama_ibu']); ?>">
                        </div>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="form-actions">
                    <a href="data_mahasiswa.php" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Batal / Kembali
                    </a>
                    <button type="submit" name="update" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan Data
                    </button>
                </div>

            </form>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="app-footer">
        <div>&copy; 2026 <span>Universitas 17 Agustus 1945 Surabaya</span> &bull; Panitia PMB Kampus Merah Putih</div>
    </footer>
</div>

</body>
</html>