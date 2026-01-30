<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login_admin.php");
    exit;
}
?>
<h2>Dashboard Admin</h2>
<p>Halo Admin <?= $_SESSION['nama_admin']; ?></p>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - Wadinmore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Dashboard Admin</h2>

  <div class="card shadow">
    <div class="card-body">
      <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
          <tr>
            <th>Nama User</th>
            <th>Paket</th>
            <th>Tanggal</th>
            <th>Venue</th>
            <th>Jumlah Tamu</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($bookings as $b): ?>
          <tr>
            <td><?= $b['nama_user'] ?></td>
            <td><?= $b['paket'] ?></td>
            <td><?= $b['tanggal'] ?></td>
            <td><?= $b['venue'] ?></td>
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
                <input type="hidden" name="nama_user" value="<?= $b['nama_user'] ?>">
                <select name="status" class="form-select form-select-sm" required>
                  <option value="">Ubah</option>
                  <option value="Pending">Pending</option>
                  <option value="Confirmed">Confirmed</option>
                  <option value="Completed">Completed</option>
                  <option value="Cancelled">Cancelled</option>
                </select>
                <button type="submit" class="btn btn-sm btn-primary">✔</button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>