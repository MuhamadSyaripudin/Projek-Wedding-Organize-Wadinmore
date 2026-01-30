<?php
session_start();
include 'config/database.php';

$nama_admin = $_POST['nama_admin'];
$password   = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM admin WHERE nama_admin='$nama_admin'");

if (mysqli_num_rows($query) == 1) {
    $admin = mysqli_fetch_assoc($query);

    if (password_verify($password, $admin['password'])) {

        $_SESSION['login'] = true;
        $_SESSION['role'] = 'admin';
        $_SESSION['id_admin'] = $admin['id_admin'];
        $_SESSION['nama_admin'] = $admin['nama_admin'];

        header("Location: admin/dashboard_admin.php");
        exit;

    } else {
        echo "<script>alert('Password admin salah');history.back();</script>";
    }
} else {
    echo "<script>alert('Admin tidak ditemukan');history.back();</script>";
}
