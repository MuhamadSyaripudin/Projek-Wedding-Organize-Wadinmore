<?php
session_start();
include 'config/database.php';

if (!isset($_SESSION['login_admin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_admin.php");
    exit;
}

$result = mysqli_query($conn, "
    SELECT * FROM bookings
    WHERE status = 'Completed'
    ORDER BY created_at DESC
");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>History Transaksi - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="d-flex justify-content-between mb-3">
    <h3>History Transaksi</h3>
    <a href="Dashboard_admin.php" class="btn btn-secondary">Kembali</a>
  </div>

  <div class="card shadow">
    <div class="card-body">
      <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th>Nama User</th>
            <th>Paket</th>
            <th>Tanggal Acara</th>
            <th>Alamat</th>
            <th>Jumlah Tamu</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($b = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $b['nama_user']; ?></td>
                <td><?= $b['nama_paket']; ?></td>
                <td><?= date('d-m-Y', strtotime($b['tanggal_acara'])); ?></td>
                <td><?= $b['alamat_acara'] ?: '-'; ?></td>
                <td><?= $b['jumlah_tamu'] ?: '-'; ?></td>
                <td>
                    <span class="badge bg-primary">Completed</span>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-muted">Belum ada history transaksi</td>
            </tr>
        <?php endif; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
