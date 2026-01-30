<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login_admin.php");
    exit;
}
?>
<h2>Dashboard Admin</h2>
<p>Halo Admin <?= $_SESSION['nama_admin']; ?></p>
