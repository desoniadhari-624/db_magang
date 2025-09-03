<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:index.php");
    exit();
}
include "config.php";

// Ambil data untuk visualisasi
$magang_count = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) as total FROM magang"))['total'];
$absen_count  = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) as total FROM absensi WHERE status='Hadir'"))['total'];
$izin_count   = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) as total FROM izin"))['total'];
$laporan_count = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) as total FROM laporan"))['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" id="sidebar-wrapper" style="min-width:250px;">
        <h3>Dashboard</h3>
        <ul class="nav flex-column mt-4">
            <li class="nav-item"><a href="dashboard.php" class="nav-link text-white">Home</a></li>
            <li class="nav-item"><a href="pages/data_magang.php" class="nav-link text-white">Data Magang</a></li>
            <li class="nav-item"><a href="pages/absensi.php" class="nav-link text-white">Absensi</a></li>
            <li class="nav-item"><a href="pages/izin.php" class="nav-link text-white">Izin</a></li>
            <li class="nav-item"><a href="pages/laporan.php" class="nav-link text-white">Laporan</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
        </ul>
    </div>

    <!-- Page content -->
    <div class="p-4" style="width:100%">
        <h2>Selamat Datang, <?php echo $_SESSION['user']; ?></h2>
        <div class="row mt-4">
            <div class="col-md-3"><div class="card p-3 text-center">Magang<br><strong><?php echo $magang_count; ?></strong></div></div>
            <div class="col-md-3"><div class="card p-3 text-center">Absensi<br><strong><?php echo $absen_count; ?></strong></div></div>
            <div class="col-md-3"><div class="card p-3 text-center">Izin<br><strong><?php echo $izin_count; ?></strong></div></div>
            <div class="col-md-3"><div class="card p-3 text-center">Laporan<br><strong><?php echo $laporan_count; ?></strong></div></div>
        </div>

        <div class="mt-5">
            <canvas id="chartData"></canvas>
        </div>
    </div>
</div>

<script>
const ctx = document.getElementById('chartData').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Magang','Absensi','Izin','Laporan'],
        datasets: [{
            label: 'Jumlah Data',
            data: [<?php echo "$magang_count,$absen_count,$izin_count,$laporan_count"; ?>],
            backgroundColor: ['#007bff','#28a745','#ffc107','#dc3545']
        }]
    }
});
</script>
</body>
</html>
