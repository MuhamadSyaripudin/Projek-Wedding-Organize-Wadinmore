<?php
session_start();
include 'config/database.php';

// Proteksi
if (!isset($_SESSION['login'])) {
    header("Location: Login.php");
    exit;
}

// Ambil data dari form (SESUAI FORM)
$nama_user     = $_POST['nama_user'];
$nama_paket    = $_POST['nama_paket'];
$alamat_acara  = $_POST['alamat_acara'];
$jumlah_tamu   = $_POST['jumlah_tamu'];
$tanggal_acara = $_POST['tanggal_acara'];
$catatan       = $_POST['catatan'];

// Ambil user ID dari session
$id_user = $_SESSION['user_id'];

// Status default
$status = 'pending';

// Query simpan booking
$query = mysqli_query($conn, "
    INSERT INTO bookings (
        id_user,
        nama_user,
        nama_paket,
        alamat_acara,
        jumlah_tamu,
        tanggal_acara,
        catatan,
        status
    ) VALUES (
        '$id_user',
        '$nama_user',
        '$nama_paket',
        '$alamat_acara',
        '$jumlah_tamu',
        '$tanggal_acara',
        '$catatan',
        '$status'
    )
");

// Cek hasil
if ($query) {
    echo "<script>
        alert('Booking berhasil dikirim!');
        window.location='Status_Booking.php';
    </script>";
} else {
    echo "Gagal menyimpan booking: " . mysqli_error($conn);
}
