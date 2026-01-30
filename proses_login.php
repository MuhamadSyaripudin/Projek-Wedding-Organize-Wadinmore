<?php
session_start();
include 'config/database.php';

$_SESSION['role'] = 'user';
header("Location: Dashboard.php");


// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Ambil data user berdasarkan username
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

if (mysqli_num_rows($query) == 1) {
    $user = mysqli_fetch_assoc($query);

    // Verifikasi password hash
    if (password_verify($password, $user['password'])) {

        // Simpan session
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

        // Redirect ke dashboard
        header("Location: Dashboard.php");
        exit;

    } else {
        echo "<script>
                alert('Password salah!');
                window.location='Login.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Username tidak ditemukan!');
            window.location='Login.php';
          </script>";
}
?>
