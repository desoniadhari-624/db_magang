<?php
include "../config.php";
if(isset($_POST['simpan'])){
    $magang_id = $_POST['magang_id'];
    $tanggal = $_POST['tanggal'];
    $alasan = $_POST['alasan'];
    mysqli_query($conn, "INSERT INTO izin (magang_id,tanggal,alasan) VALUES ('$magang_id','$tanggal','$alasan')");
    header("location:../pages/izin.php");
}
$magang = mysqli_query($conn, "SELECT * FROM magang");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Izin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Izin</h2>
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
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alasan</label>
            <textarea name="alasan" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="../pages/izin.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
