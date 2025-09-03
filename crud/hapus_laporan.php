<?php
include "../config.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM laporan WHERE id='$id'");
header("location:../pages/laporan.php");
