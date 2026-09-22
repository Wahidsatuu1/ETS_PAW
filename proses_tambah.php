<?php
include 'koneksi.php';
/** @var mysqli $koneksi */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
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
    $tahun_masuk = $_POST['tahun_masuk'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $agama = $_POST['agama'];

    $sql = "INSERT INTO mahasiswa_baru (
                nbi, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, 
                alamat, provinsi, kabupaten, kode_pos, email, telepon, 
                jurusan, tahun_masuk, nama_ayah, nama_ibu, agama
            ) VALUES (
                '$nbi', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin',
                '$alamat', '$provinsi', '$kabupaten', '$kode_pos', '$email', '$telepon',
                '$jurusan', '$tahun_masuk', '$nama_ayah', '$nama_ibu', '$agama'
            )";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: form_tambah.php?status=success");
    } else {
        header("Location: form_tambah.php?status=error");
    }
    exit;
} else {
    header("Location: form_tambah.php");
    exit;
}
?>