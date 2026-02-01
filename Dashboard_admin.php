<?php
session_start();
include 'config/database.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_admin.php");
    exit;
}

$result = mysqli_query($conn, "
  SELECT * FROM bookings 
  ORDER BY created_at DESC
");
$bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Dashboard Admin</h2>
  <p>Halo Admin <strong><?= $_SESSION['nama_admin']; ?></strong></p>

  <table class="table table-bordered table-striped text-center">
    <thead class="table-dark">
      <tr>
        <th>Nama User</th>
        <th>Paket</th>
        <th>Tanggal</th>
        <th>Alamat / Venue</th>
        <th>Jumlah Tamu</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach($bookings as $b): ?>
      <tr>
        <td><?= htmlspecialchars($b['nama_user']) ?></td>
        <td><?= $b['nama_paket'] ?></td>
        <td><?= $b['tanggal_acara'] ?></td>
        <td>
          <?php
            if (!empty($b['venue'])) {
                echo htmlspecialchars($b['venue']);
            } elseif (!empty($b['alamat_acara'])) {
                echo htmlspecialchars($b['alamat_acara']);
            } else {
                echo '-';
            }
          ?>
        </td>
        <td><?= $b['jumlah_tamu'] ?></td>
        <td>
          <?php if($b['status']=="Pending"): ?>
            <span class="badge bg-warning text-dark">Pending</span>
          <?php elseif($b['status']=="Confirmed"): ?>
            <span class="badge bg-success">Confirmed</span>
          <?php elseif($b['status']=="Completed"): ?>
            <span class="badge bg-primary">Completed</span>
          <?php else: ?>
            <span class="badge bg-danger">Cancelled</span>
          <?php endif; ?>
        </td>
        <td>
          <form action="update_status.php" method="post" class="d-flex gap-1">
            <input type="hidden" name="id_booking" value="<?= $b['id_booking'] ?>">
            <select name="status" class="form-select form-select-sm" required>
              <option value="">Ubah</option>
              <option value="pending">Pending</option>
              <option value="confirmed">Confirmed</option>
              <option value="completed">Completed</option>
              <option value="cancelled">Cancelled</option>
            </select>
            <button class="btn btn-sm btn-primary">✔</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>

</body>
</html>
