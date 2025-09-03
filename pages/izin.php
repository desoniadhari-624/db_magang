<?php
include "../config.php";
$result = mysqli_query($conn, "SELECT i.id, m.nama, i.tanggal, i.alasan 
                               FROM izin i 
                               JOIN magang m ON i.magang_id = m.id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Izin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Data Izin</h2>
    <a href="../crud/tambah_izin.php" class="btn btn-primary mb-2">Tambah Izin</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Magang</th>
                <th>Tanggal</th>
                <th>Alasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['alasan'] ?></td>
                <td>
                    <a href="../crud/edit_izin.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="../crud/hapus_izin.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
