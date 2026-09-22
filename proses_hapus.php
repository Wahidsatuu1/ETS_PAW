<?php
include 'koneksi.php';
/** @var mysqli $koneksi */

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM mahasiswa_baru WHERE id = $id";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: data_mahasiswa.php?status=deleted");
    } else {
        header("Location: data_mahasiswa.php?status=error");
    }
} else {
    header("Location: data_mahasiswa.php");
}
?>