<?php
include 'config/database.php';

// Ambil data dari form
$nama_lengkap = $_POST['nama'];
$no_hp        = $_POST['no_hp'];
$username     = $_POST['username'];
$password     = $_POST['password'];

// Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Cek username
$cek = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>
            alert('Username sudah digunakan!');
            window.location='register.php';
          </script>";
    exit;
}

// Simpan data
$sql = "INSERT INTO users (nama_lengkap, username, no_hp, password)
        VALUES ('$nama_lengkap', '$username', '$no_hp', '$password_hash')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Registrasi berhasil, silakan login');
            window.location='login.php';
          </script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}

?>
