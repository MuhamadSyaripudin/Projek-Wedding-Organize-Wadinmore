<?php
session_start();
include 'config/database.php';

// Ambil data dari form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Ambil data user berdasarkan username
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

if (mysqli_num_rows($query) === 1) {

    $user = mysqli_fetch_assoc($query);

    // Verifikasi password hash
    if (password_verify($password, $user['password'])) {

        // LOGIN BERHASIL → set session
        $_SESSION['login'] = true;
        $_SESSION['role'] = 'user';
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

        // Redirect ke dashboard
        header("Location: Dashboard.php");
        exit;

    } else {
        // PASSWORD SALAH
        $_SESSION['error'] = "Password yang Anda masukkan salah!";
        header("Location: Login.php");
        exit;
    }

} else {
    // USERNAME TIDAK DITEMUKAN
    $_SESSION['error'] = "Username tidak ditemukan!";
    header("Location: Login.php");
    exit;
}
