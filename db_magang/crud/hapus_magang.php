<?php
include "../config.php";

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

if($id){
    // Hapus data magang
    mysqli_query($conn, "DELETE FROM magang WHERE id='$id'");
}

// Redirect ke halaman Data Magang
header("Location: ../pages/data_magang.php");
exit();
