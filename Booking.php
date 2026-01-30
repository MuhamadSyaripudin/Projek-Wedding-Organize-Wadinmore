<?php
session_start();

// Proteksi halaman
if (!isset($_SESSION['login'])) {
    header("Location: Login.php");
    exit;
}

// Ambil nama user dari session
$nama_user = $_SESSION['nama_lengkap'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Booking - Wadinmore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      padding-top: 80px;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="text-center mb-4">
        <h2 class="fw-bold">Form Booking</h2>
        <p class="text-muted">
          Halo <strong><?= htmlspecialchars($nama_user); ?></strong>,  
          silakan isi form booking di bawah ini.
        </p>
      </div>

      <div class="card shadow-sm">
        <div class="card-body">

          <form action="proses_booking.php" method="post">

            <!-- NAMA USER -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Nama Lengkap</label>
              <input 
                type="text" 
                name="nama_user" 
                class="form-control" 
                value="<?= htmlspecialchars($nama_user); ?>" 
                readonly
              >
            </div>

            <!-- PAKET -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Pilih Paket</label>
              <select name="nama_paket" class="form-select" required>
                <option value="">-- Pilih Paket --</option>
                <option value="Paket 1">Paket 1</option>
                <option value="Paket 2">Paket 2</option>
                <option value="Paket 3">Paket 3</option>
                <option value="Paket 4">Paket 4</option>
                <option value="Paket 5">Paket 5</option>
                <option value="Paket 500">Paket 500</option>
                <option value="Paket Intimate 1">Paket Intimate 1</option>
                <option value="Paket Intimate 2">Paket Intimate 2</option>
                <option value="Paket Venue">Paket Venue</option>
              </select>
            </div>

            <!-- ALAMAT ACARA -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Alamat Acara</label>
              <input 
                type="text" 
                name="alamat_acara" 
                class="form-control" 
                placeholder="Masukkan alamat acara"
                required
              >
            </div>

            <!-- JUMLAH TAMU -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Jumlah Tamu</label>
              <input 
                type="number" 
                name="jumlah_tamu" 
                class="form-control" 
                placeholder="Contoh: 200"
                required
              >
            </div>

            <!-- TANGGAL -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Tanggal Pernikahan</label>
              <input 
                type="date" 
                name="tanggal_acara" 
                class="form-control" 
                required
              >
            </div>

            <!-- CATATAN -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Catatan Tambahan</label>
              <textarea 
                name="catatan" 
                class="form-control" 
                rows="3"
                placeholder="Opsional"
              ></textarea>
            </div>

            <!-- SUBMIT -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">
                Kirim Booking
              </button>
            </div>

          </form>

          <div class="d-grid mt-3">
            <a href="Status_Booking.php" class="btn btn-success">
              Lihat Status Booking
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
