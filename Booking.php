<?php
session_start();

// FE version: placeholder sementara, backend nanti ganti
$nama_user = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'User';

// Cek apakah user sudah login
if(!isset($_SESSION['id_user'])){
    // Kalau belum login → redirect ke login_user.php
    //header("Location: Login.php");
    //exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Booking - Wadinmore Wedding Organizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { padding-top: 70px; } /* buat navbar fixed */
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
  <h1 class="text-center mb-4">Form Booking</h1>
  <p class="text-center mb-5">
    Halo <strong><?php echo $nama_user; ?></strong>, Silakan isi form di bawah untuk memesan paket Wadinmore Wedding Organizer.
  </p>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-body">

          <form action="proses_booking.php" method="post">

            <div class="mb-3">
              <label class="form-label">Paket</label>
              <select name="paket" id="paket" class="form-select" required>
                <option value="">-- Pilih Paket --</option>
                <option value="Silver">Silver (tanpa venue)</option>
                <option value="Gold">Gold (termasuk venue)</option>
                <option value="Platinum">Platinum (termasuk venue)</option>
              </select>
            </div>

            <!-- Venue & kapasitas (hanya untuk paket include venue) -->
            <div id="venue-info" style="display:none;">
              <div class="mb-3">
                <label class="form-label">Venue</label>
                <input type="text" id="venue-name" class="form-control" readonly>
              </div>
              <div class="mb-3">
                <label class="form-label">Kapasitas Maksimal</label>
                <input type="text" id="venue-capacity" class="form-control" readonly>
              </div>
            </div>

            <!-- Alamat acara (hanya untuk paket tanpa venue) -->
            <div id="alamat-acara">
              <div class="mb-3">
                <label class="form-label">Alamat Acara</label>
                <input type="text" name="alamat_acara" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">Perkiraan Jumlah Tamu</label>
                <input type="number" name="jumlah_tamu" class="form-control">
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Tanggal Pernikahan</label>
              <input type="date" name="tanggal_acara" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Catatan Tambahan</label>
              <textarea name="catatan" class="form-control" rows="3"></textarea>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Kirim Booking</button>
            </div>

          </form>

          <!-- Tombol Lihat Status Booking -->
          <div class="d-grid mt-3">
            <a href="Status_Booking.php" class="btn btn-success">Lihat Status Booking</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS untuk toggle venue / alamat -->
<script>
  const paketSelect = document.getElementById('paket');
  const venueInfo = document.getElementById('venue-info');
  const alamatAcara = document.getElementById('alamat-acara');
  const venueName = document.getElementById('venue-name');
  const venueCapacity = document.getElementById('venue-capacity');

  paketSelect.addEventListener('change', function() {
    const paket = this.value;

    if(paket === 'Gold') {
      venueInfo.style.display = 'block';
      alamatAcara.style.display = 'none';
      venueName.value = 'Ballroom A';
      venueCapacity.value = '200 orang';
    } else if(paket === 'Platinum') {
      venueInfo.style.display = 'block';
      alamatAcara.style.display = 'none';
      venueName.value = 'Grand Ballroom';
      venueCapacity.value = '400 orang';
    } else {
      venueInfo.style.display = 'none';
      alamatAcara.style.display = 'block';
      venueName.value = '';
      venueCapacity.value = '';
    }
  });
</script>
</body>
</html>

