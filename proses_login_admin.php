<?php
session_start();
include 'config/database.php';

$nama_admin = $_POST['nama_admin'];
$password   = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM admin WHERE nama_admin='$nama_admin'");

if (mysqli_num_rows($query) === 1) {
    $admin = mysqli_fetch_assoc($query);

    if (password_verify($password, $admin['password'])) {

        $_SESSION['login_admin'] = true;
        $_SESSION['admin_id']    = $admin['id_user'];
        $_SESSION['nama_admin']  = $admin['nama_admin'];
        $_SESSION['role']        = 'admin';

        header("Location: Dashboard_admin.php");
        exit;

    } else {
        $_SESSION['error'] = "Password admin salah!";
        header("Location: login_admin.php");
        exit;
    }

} else {
    $_SESSION['error'] = "Nama admin tidak ditemukan!";
    header("Location: login_admin.php");
    exit;
}
?>
