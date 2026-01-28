<?php
// FE version: placeholder sementara, backend nanti ganti dari DB
$nama_user = "User";
$paket = "Gold";
$tanggal_acara = "2026-03-25";
$harga_paket = 5000000; // contoh harga paket
$dp_min = 1000000; // DP minimal semua paket
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembayaran - Wadinmore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding-top: 70px; }
    .card { max-width: 700px; margin: auto; }
  </style>
</head>
<body>

<div class="container mt-5">
  <h1 class="text-center mb-4">Konfirmasi Pembayaran</h1>
  <p class="text-center mb-5">
    Halo <strong><?php echo $nama_user; ?></strong>, silakan konfirmasi pembayaran DP untuk booking Anda.
  </p>

  <div class="card shadow-sm mb-5">
    <div class="card-body">
      <h5 class="mb-3">Informasi Booking</h5>
      <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Paket:</strong> <?php echo $paket; ?></li>
        <li class="list-group-item"><strong>Tanggal Pernikahan:</strong> <?php echo $tanggal_acara; ?></li>
        <li class="list-group-item"><strong>Harga Paket:</strong> Rp <?php echo number_format($harga_paket,0,",","."); ?></li>
        <li class="list-group-item"><strong>DP Minimal:</strong> Rp <?php echo number_format($dp_min,0,",","."); ?> (Non-refundable)</li>
      </ul>

      <form action="proses_pembayaran.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nama Pengirim</label>
          <input type="text" name="nama_pengirim" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Transfer</label>
          <input type="date" name="tanggal_transfer" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Jumlah DP yang Ditransfer</label>
          <input type="number" name="jumlah_dp" id="jumlah_dp" class="form-control" value="<?php echo $dp_min; ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Upload Bukti Transfer</label>
          <input type="file" name="bukti_transfer" class="form-control">
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Kirim Konfirmasi</button>
        </div>
      </form>

      <p class="text-center mt-3 text-muted">
        *DP minimal Rp 1.000.000 dan bersifat <strong>non-refundable</strong>.*<br>
        *Setelah submit, admin akan memverifikasi DP Anda dan memperbarui status booking.*
      </p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Validasi DP minimal 1jt -->
<script>
const form = document.querySelector('form');
const inputDP = document.getElementById('jumlah_dp');

form.addEventListener('submit', function(e){
    if(parseInt(inputDP.value) < 1000000){
        e.preventDefault();
        alert('Jumlah DP minimal Rp 1.000.000');
        inputDP.focus();
    }
});
</script>

</body>
</html>
