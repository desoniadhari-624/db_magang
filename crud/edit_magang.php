<?php
include "../config.php";

// Ambil ID dari URL
$id = $_GET['id'] ?? null;
if(!$id){
    header("Location: ../pages/data_magang.php");
    exit();
}

// Ambil data magang yang akan diedit
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM magang WHERE id='$id'"));

// Jika tombol update ditekan
if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];

    mysqli_query($conn, "UPDATE magang SET 
                        nama='$nama',
                        divisi='$divisi',
                        tgl_mulai='$tgl_mulai',
                        tgl_selesai='$tgl_selesai'
                        WHERE id='$id'");

    header("Location: ../pages/data_magang.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Data Magang</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Divisi</label>
            <input type="text" name="divisi" class="form-control" value="<?= htmlspecialchars($data['divisi']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tgl_mulai" class="form-control" value="<?= $data['tgl_mulai'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tgl_selesai" class="form-control" value="<?= $data['tgl_selesai'] ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="../pages/data_magang.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
