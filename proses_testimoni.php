<?php
session_start();
include 'config/database.php';

// Proteksi user
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
    header("Location: login_user.php");
    exit;
}

$id_user    = $_SESSION['user_id'];
$nama_user  = $_SESSION['nama_lengkap'];
$pesan      = trim($_POST['pesan'] ?? '');

if ($pesan == '') {
    $_SESSION['error'] = "Pesan testimoni tidak boleh kosong!";
    header("Location: Testimoni.php");
    exit;
}

// Simpan ke database
$query = mysqli_query($conn, "
    INSERT INTO testimoni (id_user, nama_user, pesan, created_at)
    VALUES ('$id_user', '$nama_user', '$pesan', NOW())
");

if ($query) {
    // optional: kasih notifikasi sukses
    $_SESSION['success'] = "Terima kasih, testimoni Anda berhasil dikirim.";

    // 🔥 PENTING: redirect ke dashboard user
    header("Location: Dashboard.php");
    exit;
} else {
    $_SESSION['error'] = "Gagal menyimpan testimoni.";
    header("Location: Testimoni.php");
    exit;
}
