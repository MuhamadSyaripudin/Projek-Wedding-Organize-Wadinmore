<?php
session_start();
include 'config/database.php';

// Proteksi halaman (khusus user)
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
    header("Location: login_user.php");
    exit;
}

$id_user   = $_SESSION['user_id'];
$nama_user = $_SESSION['nama_lengkap'];

// Ambil data booking user
$query = mysqli_query($conn, "
    SELECT * FROM bookings 
    WHERE id_user = '$id_user'
    ORDER BY created_at DESC
");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Status Booking - Wadinmore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding-top: 70px; }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
  <h1 class="text-center mb-4">Status Booking Anda</h1>
  <p class="text-center mb-5">
    Halo <strong><?= $nama_user; ?></strong>, berikut status booking pernikahan Anda:
  </p>

  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="card shadow-sm">
        <div class="card-body">

          <?php if (mysqli_num_rows($query) > 0): ?>
          <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
              <tr>
                <th>Paket</th>
                <th>Tanggal</th>
                <th>Alamat Acara</th>
                <th>Jumlah Tamu</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

              <?php while ($data = mysqli_fetch_assoc($query)): ?>
              <tr>
                <td><?= htmlspecialchars($data['nama_paket']); ?></td>
                <td><?= date('d-m-Y', strtotime($data['tanggal_acara'])); ?></td>
                <td><?= $data['alamat_acara'] ?: '-'; ?></td>
                <td><?= $data['jumlah_tamu'] ?: '-'; ?></td>

                <!-- STATUS -->
                <td>
                  <?php
                  if ($data['status'] === 'Pending') {
                      echo '<span class="badge bg-warning text-dark">Pending</span>';
                  } elseif ($data['status'] === 'Confirmed') {
                      echo '<span class="badge bg-success">Confirmed</span>';
                  } elseif ($data['status'] === 'Completed') {
                      echo '<span class="badge bg-primary">Completed</span>';
                  } elseif ($data['status'] === 'Cancelled') {
                      echo '<span class="badge bg-danger">Cancelled</span>';
                  }
                  ?>
                </td>

                <!-- AKSI -->
                <td>
                  <?php if ($data['status'] === 'Confirmed'): ?>
                    <a href="Pembayaran.php?id=<?= $data['id_booking']; ?>" 
                       class="btn btn-sm btn-success">
                      💳 Pembayaran
                    </a>

                  <?php elseif ($data['status'] === 'Cancelled'): ?>
                    <span class="text-muted">Tidak ada aksi</span>

                  <?php elseif ($data['status'] === 'Completed'): ?>
                    <span class="text-muted">Selesai</span>

                  <?php else: ?>
                    <span class="text-muted">Menunggu konfirmasi</span>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endwhile; ?>

            </tbody>
          </table>
          <?php else: ?>
            <p class="text-center text-muted">Belum ada booking yang dibuat.</p>
          <?php endif; ?>

          <p class="text-center mt-3">
            <em>*Status booking akan diperbarui oleh admin*</em>
          </p>

          <div class="text-center mt-4">
            <a href="Booking.php" class="btn btn-secondary">Kembali ke Booking</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
