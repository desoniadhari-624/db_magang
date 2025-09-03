<?php
include "../config.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM izin WHERE id='$id'");
header("location:../pages/izin.php");
