<?php
session_start();
include 'config/database.php';

// Proteksi admin
if (!isset($_SESSION['login_admin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_admin.php");
    exit;
}

// ❗ booking COMPLETED tidak ditampilkan
$result = mysqli_query($conn, "
    SELECT * FROM bookings 
    WHERE status != 'Completed'
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
  <!-- HEADER -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h5>Halo  <strong><?= $_SESSION['nama_admin']; ?></strong></h5>

    <a href="history_transaksi.php" class="btn btn-outline-primary">
      History Transaksi
    </a>
  </div>

  <div class="card shadow">
    <div class="card-body">
      <table class="table table-bordered table-striped text-center align-middle">
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

        <?php if (count($bookings) > 0): ?>
          <?php foreach ($bookings as $b): ?>
          <tr>
            <td><?= htmlspecialchars($b['nama_user']); ?></td>
            <td><?= htmlspecialchars($b['nama_paket']); ?></td>
            <td><?= date('d-m-Y', strtotime($b['tanggal_acara'])); ?></td>

            <!-- Alamat / Venue -->
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

            <td><?= $b['jumlah_tamu'] ?: '-'; ?></td>

            <!-- STATUS -->
            <td>
              <?php if ($b['status'] === 'Pending'): ?>
                <span class="badge bg-warning text-dark">Pending</span>
              <?php elseif ($b['status'] === 'Confirmed'): ?>
                <span class="badge bg-success">Confirmed</span>
              <?php elseif ($b['status'] === 'Cancelled'): ?>
                <span class="badge bg-danger">Cancelled</span>
              <?php endif; ?>
            </td>

            <!-- AKSI -->
            <td>
              <form action="update_status.php" method="post" class="d-flex gap-1">
                <input type="hidden" name="id_booking" value="<?= $b['id_booking']; ?>">

                <select name="status" class="form-select form-select-sm" required>
                  <option value="">Ubah</option>
                  <option value="Pending">Pending</option>
                  <option value="Confirmed">Confirmed</option>
                  <option value="Completed">Completed</option>
                  <option value="Cancelled">Cancelled</option>
                </select>

                <button class="btn btn-sm btn-primary">✔</button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-muted">Belum ada data booking</td>
          </tr>
        <?php endif; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
