<?php
include 'config/database.php';

$id_booking = $_POST['id_booking'];
$status     = $_POST['status'];

$query = mysqli_query($conn, "
  UPDATE bookings 
  SET status = '$status'
  WHERE id_booking = '$id_booking'
");

if ($query) {
    header("Location: dashboard_admin.php");
} else {
    echo "Gagal update status: " . mysqli_error($conn);
}
