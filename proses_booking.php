<?php
session_start();
include 'config/database.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
    header("Location: Login.php");
    exit;
}

$id_user       = $_SESSION['user_id'];
$nama_user     = $_SESSION['nama_lengkap'];
$nama_paket    = $_POST['nama_paket'];
$alamat_acara  = $_POST['alamat_acara'] ?? null;
$tanggal_acara = $_POST['tanggal_acara'];
$catatan       = $_POST['catatan'] ?? null;

/* ===============================
   FIX JUMLAH TAMU
================================ */
if (!empty($_POST['jumlah_tamu_auto'])) {
    $jumlah_tamu = $_POST['jumlah_tamu_auto']; // dari venue
} else {
    $jumlah_tamu = $_POST['jumlah_tamu']; // manual
}

$status = 'Pending';

$query = mysqli_query($conn, "
    INSERT INTO bookings (
        id_user,
        nama_user,
        nama_paket,
        alamat_acara,
        jumlah_tamu,
        tanggal_acara,
        catatan,
        status,
        created_at
    ) VALUES (
        '$id_user',
        '$nama_user',
        '$nama_paket',
        '$alamat_acara',
        '$jumlah_tamu',
        '$tanggal_acara',
        '$catatan',
        '$status',
        NOW()
    )
");

if ($query) {
    header("Location: Status_Booking.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
