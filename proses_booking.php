<?php
session_start();
include 'config/database.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

$id_user       = $_SESSION['user_id'];
$nama_user     = $_SESSION['nama_lengkap'];
$nama_paket    = $_POST['nama_paket'];
$tanggal_acara = $_POST['tanggal_acara'];
$alamat_acara  = $_POST['alamat_acara'] ?? null;
$catatan       = $_POST['catatan'] ?? null;

/* ===============================
   FIX JUMLAH TAMU
================================ */
if (!empty($_POST['jumlah_tamu_auto'])) {
    $jumlah_tamu = $_POST['jumlah_tamu_auto'];
} else {
    $jumlah_tamu = $_POST['jumlah_tamu'];
}

/* ===============================
   🔥 VALIDASI TANGGAL BOOKING
   MAX 2 BOOKING PER TANGGAL
================================ */
$cekTanggal = mysqli_query($conn, "
    SELECT COUNT(*) AS total 
    FROM bookings 
    WHERE tanggal_acara = '$tanggal_acara'
");
>>>>>>> 4c396e44e48d607f3067e6f7d61a8b0623082a20

$dataTanggal = mysqli_fetch_assoc($cekTanggal);

if ($dataTanggal['total'] >= 2) {
    $_SESSION['error'] = "Tanggal yang Anda pilih sudah penuh. Silakan pilih tanggal lain.";
    header("Location: Booking.php");
    exit;
}

/* ===============================
   INSERT BOOKING
================================ */
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
        'Pending',
        NOW()
    )
");

if ($query) {
    $_SESSION['success'] = "Booking berhasil dibuat. Menunggu konfirmasi admin.";
    header("Location: Status_booking.php");
    exit;
} else {
    $_SESSION['error'] = "Terjadi kesalahan saat booking.";
    header("Location: Booking.php");
    exit;
}
