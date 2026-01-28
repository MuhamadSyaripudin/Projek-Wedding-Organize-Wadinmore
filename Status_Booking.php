<?php
// FE version: placeholder sementara, backend nanti ganti
$nama_user = "User"; // frontend placeholder
$paket = "Gold";     // contoh data sementara
$tanggal = "2026-03-25";
$venue = "Ballroom A";
$jumlah_tamu = 200;
$status = "Confirmed"; // Pending / Confirmed / Cancelled
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

<div class="container mt-5">
  <h1 class="text-center mb-4">Status Booking Anda</h1>
  <p class="text-center mb-5">Halo <strong><?php echo $nama_user; ?></strong>, berikut status booking pernikahan Anda:</p>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="table-light">
              <tr>
                <th>Paket</th>
                <th>Tanggal</th>
                <th>Venue / Alamat</th>
                <th>Jumlah Tamu</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $paket; ?></td>
                <td><?php echo $tanggal; ?></td>
                <td><?php echo $venue; ?></td>
                <td><?php echo $jumlah_tamu; ?></td>
                <td>
                  <?php
                    if($status == "Pending"){
                      echo '<span class="badge bg-warning text-dark">Pending</span>';
                    } elseif($status == "Confirmed"){
                      echo '<span class="badge bg-success">Confirmed</span>';
                    } else {
                      echo '<span class="badge bg-danger">Cancelled</span>';
                    }
                  ?>
                </td>
              </tr>
            </tbody>
          </table>

          <p class="text-center mt-3">
            <em>*Status akan diperbarui otomatis oleh sistem setelah admin konfirmasi*</em>
          </p>

          <!-- Tombol lanjut ke pembayaran jika status Confirmed -->
          <div class="text-center mt-4">
            <?php if($status == "Confirmed"): ?>
              <a href="Pembayaran.php" class="btn btn-success">Lanjut ke Pembayaran</a>
            <?php endif; ?>
            <a href="Booking.php" class="btn btn-secondary mt-2">Kembali ke Booking</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
