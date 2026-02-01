<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: Login.php");
    exit;
}

$nama_user = $_SESSION['nama_lengkap'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Booking - Wadinmore Wedding Organizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { padding-top: 70px; }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
  <h1 class="text-center mb-4">Form Booking</h1>
  <p class="text-center">
    Halo <strong><?= htmlspecialchars($nama_user); ?></strong>,
    silakan isi form booking di bawah ini.
  </p>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-body">

          <form action="proses_booking.php" method="post">

            <div class="mb-3">
              <label class="form-label fw-semibold">Nama Lengkap</label>
              <input type="text" class="form-control"
                     value="<?= htmlspecialchars($nama_user); ?>" readonly>
            </div>

            <div class="mb-3">
              <label class="form-label">Paket</label>
              <select name="nama_paket" id="paket" class="form-select" required>
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

            <!-- VENUE -->
            <div id="venue-info" class="d-none">
              <div class="mb-3">
                <label class="form-label">Venue</label>
                <select id="venue-name" name="venue" class="form-select"></select>
              </div>

              <div class="mb-3">
                <label class="form-label">Kapasitas Maksimal</label>
                <input type="text" id="venue-capacity" class="form-control" readonly>
              </div>
            </div>

            <!-- ALAMAT -->
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

            <input type="hidden" name="jumlah_tamu_auto" id="jumlah_tamu_auto">

            <div class="mb-3">
              <label class="form-label">Tanggal Pernikahan</label>
              <input type="date" name="tanggal_acara" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Catatan Tambahan</label>
              <textarea name="catatan" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">
              Kirim Booking
            </button>
          </form>

          <a href="Status_Booking.php" class="btn btn-success w-100 mt-3">
            Lihat Status Booking
          </a>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const paketSelect   = document.getElementById('paket');
const venueInfo     = document.getElementById('venue-info');
const alamatAcara   = document.getElementById('alamat-acara');
const venueName     = document.getElementById('venue-name');
const venueCapacity = document.getElementById('venue-capacity');
const jumlahAuto    = document.getElementById('jumlah_tamu_auto');

const venueData = {
  Paket500: [
    { name: "Desofia Hotel Dago", capacity: 300 }
  ],
  PaketIntimate1: [
    { name: "Mang Kabayan Resto", capacity: 200 },
    { name: "Desofia Hotel Dago", capacity: 300 }
  ],
  PaketIntimate2: [
    { name: "Mang Kabayan Resto", capacity: 200 },
    { name: "Desofia Hotel Dago", capacity: 300 }
  ],
  PaketVenue: [
    { name: "Cibabat Park", capacity: 200 },
    { name: "Kiara Beat n Better", capacity: 300 },
    { name: "Paku Haji", capacity: 300 }
  ]
};

paketSelect.addEventListener('change', function () {
  const paket = this.value;

  venueInfo.classList.add('d-none');
  alamatAcara.classList.remove('d-none');
  jumlahAuto.value = "";

  if (venueData[paket]) {
    venueInfo.classList.remove('d-none');
    venueName.innerHTML = "";

    venueData[paket].forEach(v => {
      const opt = document.createElement('option');
      opt.value = v.name;
      opt.textContent = `${v.name} (${v.capacity} orang)`;
      opt.dataset.capacity = v.capacity;
      venueName.appendChild(opt);
    });

    venueCapacity.value = venueData[paket][0].capacity + " orang";

    // HANYA paket full venue
    if (paket === "Paket500" || paket === "PaketVenue") {
      alamatAcara.classList.add('d-none');
      jumlahAuto.value = venueData[paket][0].capacity;
    }
  }
});

venueName.addEventListener('change', function () {
  const cap = this.options[this.selectedIndex].dataset.capacity;
  venueCapacity.value = cap + " orang";

  if (paketSelect.value === "Paket500" || paketSelect.value === "PaketVenue") {
    jumlahAuto.value = cap;
  }
});
</script>

</body>
</html>
