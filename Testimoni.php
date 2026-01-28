<?php
session_start();

// Placeholder user login & status booking FE
$nama_user = "Nadia & Rafi";     // nanti dari session
$status_booking = "Completed";   // contoh status: Pending / Confirmed / Completed

// Placeholder daftar testimoni dari DB
$testimoni_list = [
    ['nama_user' => 'Andi & Sinta', 'pesan' => 'Pelayanan profesional dan ramah. Catering enak, photografer handal.'],
    ['nama_user' => 'Lina & Budi', 'pesan' => 'Super puas dengan konsep yang sesuai keinginan. Highly recommended!']
];
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

<div class="container py-5">
  <h2 class="text-center fw-bold mb-5">Apa Kata Klien Kami</h2>

  <!-- Daftar Testimoni -->
  <div class="row g-4">
    <?php foreach($testimoni_list as $t): ?>
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <p class="card-text"><?php echo $t['pesan']; ?></p>
          <h6 class="fw-bold mb-0">– <?php echo $t['nama_user']; ?></h6>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Form Input Testimoni (hanya user Completed) -->
  <?php if($status_booking === "Completed"): ?>
  <div class="mt-5">
    <h4 class="fw-bold mb-3">Tinggalkan Testimoni Anda, <?php echo $nama_user; ?></h4>
    <form action="proses_testimoni.php" method="post">
      <div class="mb-3">
        <label class="form-label">Pesan</label>
        <textarea name="pesan" class="form-control" rows="3" required></textarea>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-success">Kirim Testimoni</button>
      </div>
    </form>
  </div>
  <?php else: ?>
  <p class="text-center mt-4 text-muted">
    Testimoni dapat diberikan setelah acara selesai.
  </p>
  <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
