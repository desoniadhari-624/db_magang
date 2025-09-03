<?php
include "../config.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM laporan WHERE id='$id'"));
$magang = mysqli_query($conn, "SELECT * FROM magang");

if(isset($_POST['update'])){
    $magang_id = $_POST['magang_id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    mysqli_query($conn, "UPDATE laporan SET magang_id='$magang_id', judul='$judul', isi='$isi', tanggal='$tanggal' WHERE id='$id'");
    header("location:../pages/laporan.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Laporan</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Magang</label>
            <select name="magang_id" class="form-select" required>
                <?php while($m = mysqli_fetch_assoc($magang)){ ?>
                <option value="<?= $m['id'] ?>" <?= $m['id']==$data['magang_id']?'selected':'' ?>><?= $m['nama'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required><?= $data['isi'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="../pages/laporan.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
