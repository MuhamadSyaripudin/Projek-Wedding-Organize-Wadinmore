<?php
session_start();
include 'config/database.php';

// Ambil semua testimoni (public)
$qTestimoni = mysqli_query($conn, "
    SELECT nama_user, pesan
    FROM testimoni
    ORDER BY created_at DESC
");

$testimoni_list = mysqli_fetch_all($qTestimoni, MYSQLI_ASSOC);

// Default
$status_booking = null;
$nama_user = null;

// Jika user login → cek status booking terakhir
if (isset($_SESSION['login']) && $_SESSION['role'] === 'user') {

    $id_user   = $_SESSION['user_id'];
    $nama_user = $_SESSION['nama_lengkap'];

    $qBooking = mysqli_query($conn, "
        SELECT status
        FROM bookings
        WHERE id_user = '$id_user'
        ORDER BY created_at DESC
        LIMIT 1
    ");

    $booking = mysqli_fetch_assoc($qBooking);
    $status_booking = $booking['status'] ?? null;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Testimoni - Wadinmore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding-top: 70px; }
    .card { height: 100%; }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container py-5">
  <h2 class="text-center fw-bold mb-5">Apa Kata Klien Kami</h2>

  <!-- DAFTAR TESTIMONI -->
  <div class="row g-4">
    <?php if (count($testimoni_list) > 0): ?>
      <?php foreach($testimoni_list as $t): ?>
        <div class="col-md-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="card-text"><?= htmlspecialchars($t['pesan']); ?></p>
              <h6 class="fw-bold mb-0">– <?= htmlspecialchars($t['nama_user']); ?></h6>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center text-muted">Belum ada testimoni.</p>
    <?php endif; ?>
  </div>

  <!-- FORM TESTIMONI (HANYA COMPLETED) -->
  <?php if ($status_booking === "Completed"): ?>
    <div class="mt-5">
      <h4 class="fw-bold mb-3">
        Tinggalkan Testimoni Anda, <?= htmlspecialchars($nama_user); ?>
      </h4>

      <form action="proses_testimoni.php" method="post">
        <div class="mb-3">
          <label class="form-label">Pesan</label>
          <textarea name="pesan" class="form-control" rows="3" required></textarea>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-success">
            Kirim Testimoni
          </button>
        </div>
      </form>
    </div>

  <?php elseif (isset($_SESSION['login'])): ?>
    <p class="text-center mt-5 text-muted">
      Testimoni hanya dapat diberikan setelah acara selesai.
    </p>
  <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
