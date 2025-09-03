<?php
include "../config.php";

// Jika tombol simpan ditekan
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];

    // Insert data ke tabel magang
    mysqli_query($conn, "INSERT INTO magang (nama, divisi, tgl_mulai, tgl_selesai) 
                         VALUES ('$nama','$divisi','$tgl_mulai','$tgl_selesai')");

    // Redirect ke halaman data magang
    header("Location: ../pages/data_magang.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Data Magang</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Divisi</label>
            <input type="text" name="divisi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tgl_mulai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tgl_selesai" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="../pages/data_magang.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
