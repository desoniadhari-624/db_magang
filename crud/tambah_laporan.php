<?php
include "../config.php";
if(isset($_POST['simpan'])){
    $magang_id = $_POST['magang_id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    mysqli_query($conn, "INSERT INTO laporan (magang_id,judul,isi,tanggal) VALUES ('$magang_id','$judul','$isi','$tanggal')");
    header("location:../pages/laporan.php");
}
$magang = mysqli_query($conn, "SELECT * FROM magang");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Laporan</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Magang</label>
            <select name="magang_id" class="form-select" required>
                <option value="">--Pilih--</option>
                <?php while($m = mysqli_fetch_assoc($magang)){ ?>
                <option value="<?= $m['id'] ?>"><?= $m['nama'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="../pages/laporan.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
