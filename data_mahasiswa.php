<?php
include 'koneksi.php';
/** @var mysqli $koneksi */

// Mengambil data statistik untuk dashboard ringkas
$total_maba = 0;
$total_2026 = 0;
$total_jurusan = 0;
$total_laki = 0;
$total_perempuan = 0;

$stat_res = mysqli_query($koneksi, "SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN tahun_masuk = 2026 THEN 1 ELSE 0 END) as maba_2026,
    COUNT(DISTINCT jurusan) as jml_jurusan,
    SUM(CASE WHEN jenis_kelamin = 'Laki-laki' THEN 1 ELSE 0 END) as jml_laki,
    SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as jml_perempuan
    FROM mahasiswa_baru");

if ($stat_res && $row_stat = mysqli_fetch_assoc($stat_res)) {
    $total_maba = (int)$row_stat['total'];
    $total_2026 = (int)$row_stat['maba_2026'];
    $total_jurusan = (int)$row_stat['jml_jurusan'];
    $total_laki = (int)$row_stat['jml_laki'];
    $total_perempuan = (int)$row_stat['jml_perempuan'];
}

// Mengambil daftar jurusan unik untuk dropdown filter
$jurusan_list = [];
$jurusan_query = mysqli_query($koneksi, "SELECT DISTINCT jurusan FROM mahasiswa_baru WHERE jurusan IS NOT NULL AND jurusan != '' ORDER BY jurusan ASC");
if ($jurusan_query) {
    while ($j = mysqli_fetch_assoc($jurusan_query)) {
        $jurusan_list[] = $j['jurusan'];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Baru - PMB UNTAG Surabaya 2026</title>
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
                <a href="data_mahasiswa.php" class="nav-link active">
                    <i class="fa-solid fa-table-list"></i> Data Mahasiswa
                </a>
                <a href="form_tambah.php" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-user-plus"></i> + Form Pendaftaran
                </a>
            </nav>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="content-area">
        <div class="page-glass-card">
            
            <!-- HEADER -->
            <div class="page-header">
                <div class="header-text">
                    <h1>
                        <i class="fa-solid fa-users-gear" style="color: var(--untag-red);"></i>
                        Rekap Data Mahasiswa Baru 2026
                    </h1>
                    <p>Sistem Informasi Penerimaan Mahasiswa Baru Tahun Akademik 2026/2027</p>
                </div>
                <div>
                    <a href="form_tambah.php" class="btn btn-tambah">
                        <i class="fa-solid fa-plus-circle"></i> + Form Pendaftaran Baru
                    </a>
                </div>
            </div>

            <!-- STATS WIDGETS -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon red">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <div class="stat-details">
                        <h4>Total Pendaftar</h4>
                        <div class="stat-number"><?php echo number_format($total_maba); ?></div>
                    </div>
                </div>

                <div class="stat-card blue">
                    <div class="stat-icon blue">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="stat-details">
                        <h4>Angkatan 2026</h4>
                        <div class="stat-number"><?php echo number_format($total_2026); ?></div>
                    </div>
                </div>

                <div class="stat-card purple">
                    <div class="stat-icon purple">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div class="stat-details">
                        <h4>Program Studi</h4>
                        <div class="stat-number"><?php echo number_format($total_jurusan); ?></div>
                    </div>
                </div>

                <div class="stat-card amber">
                    <div class="stat-icon amber">
                        <i class="fa-solid fa-venus-mars"></i>
                    </div>
                    <div class="stat-details">
                        <h4>L / P</h4>
                        <div class="stat-number" style="font-size: 18px;">
                            <?php echo $total_laki; ?> L <span style="color: #cbd5e1;">|</span> <?php echo $total_perempuan; ?> P
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEARCH & FILTER TOOLBAR -->
            <div class="toolbar-bar">
                <div class="search-wrapper">
                    <i class="fa-solid fa-magnifying-glass search-icon-left"></i>
                    <input type="text" id="liveSearchInput" class="search-input" placeholder="Cari NBI, Nama Lengkap, Jurusan, atau Email...">
                </div>

                <div class="filter-group">
                    <label for="filterJurusan" style="font-size: 13px; font-weight: 600; color: #475569;">
                        <i class="fa-solid fa-filter"></i> Jurusan:
                    </label>
                    <select id="filterJurusan" class="filter-select">
                        <option value="">Semua Program Studi</option>
                        <?php foreach ($jurusan_list as $jur): ?>
                            <option value="<?php echo htmlspecialchars($jur); ?>"><?php echo htmlspecialchars($jur); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- TABLE MAHASISWA -->
            <div class="table-responsive">
                <table id="mabaTable">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>NBI</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi / Jurusan</th>
                            <th>Tahun Masuk</th>
                            <th>Kontak</th>
                            <th style="text-align: center; width: 220px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM mahasiswa_baru ORDER BY id DESC";
                        $result = mysqli_query($koneksi, $sql);
                        
                        if ($result && mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Inisial avatar
                                $words = explode(' ', trim($row['nama_lengkap']));
                                $initials = strtoupper(substr($words[0], 0, 1));
                                if (isset($words[1])) {
                                    $initials .= strtoupper(substr($words[1], 0, 1));
                                }

                                // Siapkan data JSON untuk modal detail
                                $json_data = htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8');
                        ?>
                            <tr class="table-row-item" 
                                data-nbi="<?php echo strtolower(htmlspecialchars($row['nbi'])); ?>"
                                data-nama="<?php echo strtolower(htmlspecialchars($row['nama_lengkap'])); ?>"
                                data-jurusan="<?php echo strtolower(htmlspecialchars($row['jurusan'])); ?>"
                                data-email="<?php echo strtolower(htmlspecialchars($row['email'])); ?>">
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <span class="badge badge-nbi"><?php echo htmlspecialchars($row['nbi']); ?></span>
                                </td>
                                <td>
                                    <div class="student-profile">
                                        <div class="student-avatar"><?php echo $initials; ?></div>
                                        <div>
                                            <div class="student-name"><?php echo htmlspecialchars($row['nama_lengkap']); ?></div>
                                            <div class="student-email">
                                                <i class="fa-regular fa-id-card"></i> <?php echo htmlspecialchars($row['jenis_kelamin'] ?: '-'); ?> &bull; <?php echo htmlspecialchars($row['agama'] ?: '-'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-jurusan">
                                        <i class="fa-solid fa-graduation-cap" style="margin-right: 4px;"></i>
                                        <?php echo htmlspecialchars($row['jurusan']); ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-year">
                                        <i class="fa-regular fa-calendar" style="margin-right: 4px;"></i>
                                        <?php echo htmlspecialchars($row['tahun_masuk']); ?>
                                    </span>
                                </td>
                                <td>
                                    <div style="font-size: 13px; color: #334155;">
                                        <i class="fa-regular fa-envelope" style="color: var(--untag-red); width: 16px;"></i>
                                        <?php echo htmlspecialchars($row['email'] ?: '-'); ?>
                                    </div>
                                    <?php if (!empty($row['telepon'])): ?>
                                        <div style="font-size: 12px; color: #64748b; margin-top: 3px;">
                                            <i class="fa-solid fa-phone" style="color: #16a34a; width: 16px;"></i>
                                            <?php echo htmlspecialchars($row['telepon']); ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="action-buttons" style="justify-content: center;">
                                        <button type="button" class="btn btn-sm btn-detail" 
                                                onclick='bukaDetailModal(<?php echo $json_data; ?>)' 
                                                title="Lihat Detail Biodata">
                                            <i class="fa-solid fa-eye"></i> Detail
                                        </button>
                                        <a href="form_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-edit" title="Edit Data">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-hapus" 
                                                onclick="hapusData(<?php echo $row['id']; ?>, '<?php echo addslashes(htmlspecialchars($row['nama_lengkap'])); ?>')" 
                                                title="Hapus Data">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php 
                            }
                        } else {
                        ?>
                            <tr id="emptyTableRow">
                                <td colspan="7">
                                    <div class="empty-data-container">
                                        <div class="empty-data-icon"><i class="fa-solid fa-folder-open"></i></div>
                                        <div class="empty-data-text">Belum ada data calon mahasiswa baru untuk Untag 2026.</div>
                                        <div style="margin-top: 15px;">
                                            <a href="index.php" class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-plus"></i> Tambah Mahasiswa Pertama
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr id="noSearchResultRow" style="display: none;">
                            <td colspan="7">
                                <div class="empty-data-container">
                                    <div class="empty-data-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                                    <div class="empty-data-text">Data yang Anda cari tidak ditemukan.</div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="app-footer">
        <div>&copy; 2026 <span>Universitas 17 Agustus 1945 Surabaya</span> &bull; Panitia Penerimaan Mahasiswa Baru (PMB) 2026/2027</div>
    </footer>
</div>

<!-- MODAL DETAIL BIODATA MAHASISWA -->
<div id="detailModal" class="modal-overlay">
    <div class="modal-card">
        <div class="modal-header">
            <h3><i class="fa-solid fa-id-badge"></i> Biodata Lengkap Mahasiswa Baru</h3>
            <button class="modal-close" onclick="tutupDetailModal()">&times;</button>
        </div>
        <div class="modal-body">
            <table class="detail-table">
                <tbody>
                    <tr><td>NBI</td><td id="m_nbi">-</td></tr>
                    <tr><td>Nama Lengkap</td><td id="m_nama" style="font-weight: 700; color: var(--untag-red);">-</td></tr>
                    <tr><td>Tempat, Tanggal Lahir</td><td id="m_ttl">-</td></tr>
                    <tr><td>Jenis Kelamin</td><td id="m_jk">-</td></tr>
                    <tr><td>Agama</td><td id="m_agama">-</td></tr>
                    <tr><td>Program Studi / Jurusan</td><td id="m_jurusan" style="font-weight: 700;">-</td></tr>
                    <tr><td>Tahun Masuk</td><td id="m_tahun">-</td></tr>
                    <tr><td>Email</td><td id="m_email">-</td></tr>
                    <tr><td>No. Telepon / WhatsApp</td><td id="m_telepon">-</td></tr>
                    <tr><td>Alamat Lengkap</td><td id="m_alamat">-</td></tr>
                    <tr><td>Kabupaten / Kota</td><td id="m_kabupaten">-</td></tr>
                    <tr><td>Provinsi</td><td id="m_provinsi">-</td></tr>
                    <tr><td>Kode Pos</td><td id="m_kodepos">-</td></tr>
                    <tr><td>Nama Ayah</td><td id="m_ayah">-</td></tr>
                    <tr><td>Nama Ibu</td><td id="m_ibu">-</td></tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="tutupDetailModal()">Tutup</button>
        </div>
    </div>
</div>

<script>
// Live Search & Filter Jurusan
const searchInput = document.getElementById('liveSearchInput');
const filterJurusan = document.getElementById('filterJurusan');
const rows = document.querySelectorAll('.table-row-item');
const noSearchResultRow = document.getElementById('noSearchResultRow');

function filterTable() {
    const query = searchInput.value.toLowerCase().trim();
    const selectedJurusan = filterJurusan.value.toLowerCase().trim();
    let visibleCount = 0;

    rows.forEach(row => {
        const nbi = row.getAttribute('data-nbi') || '';
        const nama = row.getAttribute('data-nama') || '';
        const jurusan = row.getAttribute('data-jurusan') || '';
        const email = row.getAttribute('data-email') || '';

        const matchQuery = !query || nbi.includes(query) || nama.includes(query) || jurusan.includes(query) || email.includes(query);
        const matchJurusan = !selectedJurusan || jurusan === selectedJurusan;

        if (matchQuery && matchJurusan) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    if (noSearchResultRow) {
        if (visibleCount === 0 && rows.length > 0) {
            noSearchResultRow.style.display = '';
        } else {
            noSearchResultRow.style.display = 'none';
        }
    }
}

if (searchInput) {
    searchInput.addEventListener('input', filterTable);
}
if (filterJurusan) {
    filterJurusan.addEventListener('change', filterTable);
}

// Modal Detail
function bukaDetailModal(data) {
    document.getElementById('m_nbi').textContent = data.nbi || '-';
    document.getElementById('m_nama').textContent = data.nama_lengkap || '-';
    
    let ttl = [];
    if (data.tempat_lahir) ttl.push(data.tempat_lahir);
    if (data.tanggal_lahir) ttl.push(data.tanggal_lahir);
    document.getElementById('m_ttl').textContent = ttl.join(', ') || '-';
    
    document.getElementById('m_jk').textContent = data.jenis_kelamin || '-';
    document.getElementById('m_agama').textContent = data.agama || '-';
    document.getElementById('m_jurusan').textContent = data.jurusan || '-';
    document.getElementById('m_tahun').textContent = data.tahun_masuk || '-';
    document.getElementById('m_email').textContent = data.email || '-';
    document.getElementById('m_telepon').textContent = data.telepon || '-';
    document.getElementById('m_alamat').textContent = data.alamat || '-';
    document.getElementById('m_kabupaten').textContent = data.kabupaten || '-';
    document.getElementById('m_provinsi').textContent = data.provinsi || '-';
    document.getElementById('m_kodepos').textContent = data.kode_pos || '-';
    document.getElementById('m_ayah').textContent = data.nama_ayah || '-';
    document.getElementById('m_ibu').textContent = data.nama_ibu || '-';

    document.getElementById('detailModal').classList.add('active');
}

function tutupDetailModal() {
    document.getElementById('detailModal').classList.remove('active');
}

// Close modal when click outside card
document.getElementById('detailModal').addEventListener('click', function(e) {
    if (e.target === this) {
        tutupDetailModal();
    }
});

// Escape key to close modal
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        tutupDetailModal();
    }
});

// Fungsi Hapus dengan SweetAlert2
function hapusData(id, nama) {
    Swal.fire({
        title: 'Hapus Data Mahasiswa?',
        text: `Data mahasiswa "${nama}" akan dihapus permanen dari sistem!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#BA1A22',
        cancelButtonColor: '#64748B',
        confirmButtonText: '<i class="fa-solid fa-trash"></i> Ya, Hapus Data',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        customClass: {
            popup: 'swal2-glass'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'proses_hapus.php?id=' + id;
        }
    });
}

// Menangani Notifikasi dari URL Parameter
<?php if (isset($_GET['status'])): ?>
    const status = "<?php echo htmlspecialchars($_GET['status']); ?>";
    let title = "";
    let text = "";
    let icon = "";

    if (status === 'success' || status === 'added') {
        title = 'Berhasil Terdaftar!';
        text = 'Data calon mahasiswa baru 2026 berhasil ditambahkan.';
        icon = 'success';
    } else if (status === 'updated') {
        title = 'Berhasil Diperbarui!';
        text = 'Data mahasiswa berhasil diperbarui.';
        icon = 'success';
    } else if (status === 'deleted') {
        title = 'Data Dihapus!';
        text = 'Data mahasiswa telah dihapus dari sistem.';
        icon = 'success';
    } else if (status === 'error') {
        title = 'Gagal!';
        text = 'Terjadi kesalahan sistem atau query database.';
        icon = 'error';
    }

    if (title) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text,
            timer: 2500,
            showConfirmButton: false,
            confirmButtonColor: '#BA1A22'
        });
    }
<?php endif; ?>
</script>

</body>
</html>