<?php
include "../config.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM absensi WHERE id='$id'"));
$magang = mysqli_query($conn, "SELECT * FROM magang");

if(isset($_POST['update'])){
    $magang_id = $_POST['magang_id'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE absensi SET magang_id='$magang_id', tanggal='$tanggal', status='$status' WHERE id='$id'");
    header("location:../pages/absensi.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Absensi</h2>
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
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="Hadir" <?= $data['status']=='Hadir'?'selected':'' ?>>Hadir</option>
                <option value="Tidak Hadir" <?= $data['status']=='Tidak Hadir'?'selected':'' ?>>Tidak Hadir</option>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="../pages/absensi.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
