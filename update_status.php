<?php
session_start();
include 'config/database.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login_admin.php");
    exit;
}

$nama_user = $_POST['nama_user'];
$status    = $_POST['status'];

$query = "UPDATE bookings SET status='$status' WHERE nama_user='$nama_user'";
mysqli_query($conn, $query);

// redirect balik ke dashboard + flag sukses
header("Location: dashboard_admin.php?success=1");
exit;