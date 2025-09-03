<?php
include "../config.php";
$result = mysqli_query($conn, "SELECT a.id, m.nama, a.tanggal, a.status 
                               FROM absensi a 
                               JOIN magang m ON a.magang_id = m.id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Data Absensi</h2>
    <a href="../crud/tambah_absen.php" class="btn btn-primary mb-2">Tambah Absensi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Magang</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <a href="../crud/edit_absen.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="../crud/hapus_absen.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
