# ETS PAW - Pendaftaran Mahasiswa Baru 2026

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

Project ini merupakan aplikasi web sederhana untuk mengelola pendaftaran mahasiswa baru di Universitas 17 Agustus 1945 Surabaya (UNTAG Surabaya) tahun 2026. Aplikasi ini dibuat dengan PHP native dan MySQL untuk menangani proses pengisian formulir, penyimpanan data, tampilan daftar pendaftar, serta edit dan hapus data.

## Preview Project

<p align="center">
  <img src="images/untag_2026.jpg" alt="Preview kampus UNTAG Surabaya" width="800" />
</p>

<p align="center">
  <img src="images/logo_untag.png" alt="Logo UNTAG Surabaya" width="220" />
</p>

## Fitur Utama

- Halaman landing page resmi PMB 2026
- Form pendaftaran calon mahasiswa baru
- Penyimpanan data ke database MySQL
- Tampilan daftar mahasiswa baru dalam tabel
- Fitur pencarian data berdasarkan NBI, nama, jurusan, dan email
- Filter berdasarkan program studi
- Fitur edit data mahasiswa
- Fitur hapus data mahasiswa
- Desain responsif dan modern dengan tema UNTAG Surabaya

## Teknologi yang Digunakan

- PHP 8+
- MySQL / MariaDB
- HTML5
- CSS3
- JavaScript
- SweetAlert2 untuk notifikasi

## Struktur Project

```text
ETS PAW/
├── index.php
├── form_tambah.php
├── form_edit.php
├── data_mahasiswa.php
├── proses_tambah.php
├── proses_hapus.php
├── koneksi.php
├── style.css
├── images/
├── README.md
└── .gitignore (opsional)
```

## Cara Kerja Aplikasi

### 1. Halaman Utama
File `index.php` berfungsi sebagai halaman utama atau landing page PMB. Halaman ini menampilkan informasi umum, logo UNTAG Surabaya, serta tombol untuk:

- mendaftar calon mahasiswa baru
- melihat data mahasiswa baru

### 2. Form Pendaftaran
File `form_tambah.php` menampilkan formulir data calon mahasiswa baru. Formulir ini berisi data seperti:

- NBI / nomor berkas
- program studi
- tahun masuk
- nama lengkap
- tempat dan tanggal lahir
- jenis kelamin
- agama
- alamat dan domisili
- email dan nomor telepon
- data orang tua

Setelah form di-submit, data dikirim ke `proses_tambah.php`.

### 3. Proses Simpan Data
File `proses_tambah.php` menerima data yang dikirim melalui form. Prosesnya adalah:

1. mengambil data dari `$_POST`
2. membuat query `INSERT INTO mahasiswa_baru ...`
3. menjalankan query ke database
4. redirect kembali ke halaman formulir atau daftar data

Jika proses berhasil, data akan tersimpan di database.

### 4. Data Mahasiswa
File `data_mahasiswa.php` adalah halaman utama untuk melihat daftar data pendaftar. Di halaman ini terdapat:

- jumlah total pendaftar
- jumlah berdasarkan angkatan
- jumlah program studi
- statistik laki-laki dan perempuan
- tabel data mahasiswa
- fitu pencarian dan filter jurusan
- tombol detail, edit, dan hapus

### 5. Edit Data
File `form_edit.php` menampilkan form yang sudah terisi dengan data mahasiswa berdasarkan `id`. Pengguna dapat memperbarui data kemudian proses update dijalankan di file yang sama.

### 6. Hapus Data
File `proses_hapus.php` menerima parameter `id` lalu menjalankan query `DELETE` untuk menghapus data dari tabel `mahasiswa_baru`.

### 7. Koneksi Database
File `koneksi.php` berfungsi sebagai penghubung aplikasi PHP dengan database MySQL. Di dalamnya, aplikasi mengatur host, username, password, dan nama database.

## Konfigurasi Database

Sebelum menjalankan aplikasi, pastikan MySQL sudah aktif dan database berikut tersedia:

```sql
CREATE DATABASE db_pendaftaran_maba;
```

Lalu buat tabel berikut:

```sql
CREATE TABLE mahasiswa_baru (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nbi VARCHAR(100),
    nama_lengkap VARCHAR(255),
    tempat_lahir VARCHAR(255),
    tanggal_lahir DATE,
    jenis_kelamin VARCHAR(50),
    alamat TEXT,
    provinsi VARCHAR(255),
    kabupaten VARCHAR(255),
    kode_pos VARCHAR(20),
    email VARCHAR(255),
    telepon VARCHAR(50),
    jurusan VARCHAR(255),
    tahun_masuk INT,
    nama_ayah VARCHAR(255),
    nama_ibu VARCHAR(255),
    agama VARCHAR(100)
);
```

Pastikan konfigurasi di file `koneksi.php` sesuai dengan setup database Anda:

```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pendaftaran_maba";
```

## Cara Menjalankan Project

1. Pastikan XAMPP / WAMP / Laragon aktif
2. Aktifkan Apache dan MySQL
3. Salin project ini ke folder `htdocs` (jika menggunakan XAMPP)
4. Buka browser dan akses:

```text
http://localhost/ETS%20PAW/
```

atau sesuai folder tempat project disimpan.

## Alur Penggunaan Aplikasi

1. Buka halaman utama
2. Klik tombol pendaftaran
3. Isi formulir mahasiswa baru
4. Simpan data
5. Lihat data pada halaman daftar mahasiswa
6. Jika perlu, lakukan edit atau hapus data

## Repository GitHub

Project ini sudah terhubung ke GitHub dan siap dikelola melalui repository.

## Catatan

Project ini dibuat untuk kebutuhan pembelajaran dan tugas ETS PAW. Jika Anda ingin mengembangkannya lebih lanjut, beberapa fitur yang bisa ditambahkan adalah:

- validasi form yang lebih ketat
- upload foto pas foto
- export data ke Excel/PDF
- login admin dan role user
- dashboard admin yang lebih lengkap

## Lisensi

Project ini dibuat untuk keperluan pembelajaran dan tidak ditujukan untuk dipublikasikan secara komersial.

---

Dibuat dengan semangat untuk mendukung proses penerimaan mahasiswa baru secara digital.
