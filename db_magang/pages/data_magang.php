<?php
include "../config.php";
$result = mysqli_query($conn,"SELECT * FROM magang");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Data Magang</h2>
    <a href="../crud/tambah_magang.php" class="btn btn-primary mb-2">Tambah Magang</a>
    <a href="../crud/edit_magang.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="../crud/hapus_magang.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data magang ini?')">Hapus</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Divisi</th>
                <th>Tgl Mulai</th>
                <th>Tgl Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['divisi']; ?></td>
                <td><?php echo $row['tgl_mulai']; ?></td>
                <td><?php echo $row['tgl_selesai']; ?></td>
                <td>
                    <a href="../crud/edit_magang.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="../crud/hapus_magang.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
