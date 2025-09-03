<?php
include "../config.php";
$result = mysqli_query($conn, "SELECT l.id, m.nama, l.judul, l.isi, l.tanggal 
                               FROM laporan l 
                               JOIN magang m ON l.magang_id = m.id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Data Laporan</h2>
    <a href="../crud/tambah_laporan.php" class="btn btn-primary mb-2">Tambah Laporan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Magang</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['isi'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                    <a href="../crud/edit_laporan.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="../crud/hapus_laporan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
