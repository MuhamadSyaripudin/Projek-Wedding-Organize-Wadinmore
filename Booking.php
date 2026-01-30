<?php
session_start();

$nama_user = isset($_SESSION['username']);

if (!isset($_SESSION['login'])) {
    header("Location: Login.php");
    exit;
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
                <option value="Paket1">Paket 1</option>
                <option value="Paket2">Paket 2</option>
                <option value="Paket3">Paket 3</option>
                <option value="Paket4">Paket 4</option>
                <option value="Paket5">Paket 5</option>
                <option value="Paket500">Paket 500</option>
                <option value="PaketIntimate1">Paket Intimate 1</option>
                <option value="PaketIntimate2">Paket Intimate 2</option>
                <option value="PaketVenue">Paket Venue</option>
              </select>
            </div>

            <!-- Venue & kapasitas (hanya untuk paket include venue) -->
            <div id="venue-info" class="d-none;">
              <div class="mb-3">
                <label class="form-label">Venue</label>
                <select id="venue-name" class="form-select"></select>
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
const paketSelect   = document.getElementById('paket');
const venueInfo     = document.getElementById('venue-info');
const alamatAcara   = document.getElementById('alamat-acara');
const venueName     = document.getElementById('venue-name');
const venueCapacity = document.getElementById('venue-capacity');

/* =========================
   DATA VENUE PER PAKET
========================= */
const venueData = {
  "Paket500": [
    { name: "Desofia Hotel Dago", capacity: "300 orang" }
  ],

  "PaketIntimate1": [
    { name: "Mang Kabayan Resto", capacity: "200 orang" },
    { name: "Desofia Hotel Dago", capacity: "300 orang" }
  ],

  "PaketIntimate2": [
    { name: "Mang Kabayan Resto", capacity: "200 orang" },
    { name: "Desofia Hotel Dago", capacity: "300 orang" }
  ],

  "PaketVenue": [
    { name: "Cibabat Park", capacity: "200 orang" },
    { name: "Kiara Beat n Better", capacity: "300 orang" },
    { name: "Paku Haji", capacity: "300 orang" }
  ]
};


/* =========================
   CHANGE PAKET
========================= */
paketSelect.addEventListener('change', function () {
  const paket = this.value;

  if (venueData[paket]) {

    venueInfo.classList.remove('d-none');
    alamatAcara.classList.add('d-none');

    venueName.innerHTML = "";

    venueData[paket].forEach((v, i) => {
      const option = document.createElement('option');
      option.value = v.name;
      option.textContent = v.name;
      option.dataset.capacity = v.capacity;
      venueName.appendChild(option);
    });

    venueCapacity.value = venueData[paket][0].capacity;

  } else {

    venueInfo.classList.add('d-none');
    alamatAcara.classList.remove('d-none');

    venueName.innerHTML = "";
    venueCapacity.value = "";
  }
});


/* =========================
   CHANGE VENUE
========================= */
venueName.addEventListener('change', function () {
  const selected = this.options[this.selectedIndex];
  venueCapacity.value = selected.dataset.capacity;
});
</script>
</body>
</html>

