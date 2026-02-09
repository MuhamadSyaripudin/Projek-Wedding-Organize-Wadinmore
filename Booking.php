<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
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

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
      /* ================= WADINMORE COLOR SYSTEM ================= */
      :root {
        --rose: #b76e79;
        --gold: #d4af37;
        --soft: #f8f0f2;
        --cream: #fffaf7;
      }

      /* ================= BODY ================= */
      body {
        padding-top: 70px;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, var(--cream), var(--soft));
      }

      /* ================= TITLE ================= */
      h1 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        letter-spacing: 1px;
        color: var(--rose);
        text-shadow: 0 3px 10px rgba(183,110,121,.15);
      }

      /* ================= SUBTEXT ================= */
      p {
        color: #666;
      }

      /* ================= CARD FORM (PREMIUM GLASS) ================= */
      .card {
        border: none;
        border-radius: 24px;
        background: rgba(255,255,255,.95);
        backdrop-filter: blur(8px);
        box-shadow: 0 20px 50px rgba(183,110,121,.15);
        padding: 10px;
        transition: .3s;
      }

      .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 30px 65px rgba(183,110,121,.25);
      }

      /* ================= LABEL ================= */
      .form-label {
        font-weight: 600;
        color: var(--rose);
      }

      /* ================= INPUT ================= */
      .form-control,
      .form-select,
      textarea {
        border-radius: 14px;
        border: 1px solid #eadfe2;
        padding: 11px 14px;
        transition: .25s;
        background: #fff;
      }

      .form-control:focus,
      .form-select:focus,
      textarea:focus {
        border-color: var(--rose);
        box-shadow: 0 0 0 4px rgba(183,110,121,.15);
      }

      /* ================= BUTTON BOOKING (ROSE + GOLD GRADIENT) ================= */
      .btn-primary {
        border: none;
        border-radius: 30px;
        font-weight: 600;
        letter-spacing: .5px;
        padding: 12px;
        background: linear-gradient(135deg, var(--rose), var(--gold));
        box-shadow: 0 10px 25px rgba(183,110,121,.35);
        transition: .3s;
      }

      .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(183,110,121,.55);
      }

      /* ================= BUTTON STATUS ================= */
      .btn-success {
        border-radius: 30px;
        font-weight: 600;
        padding: 12px;
        background: linear-gradient(135deg, var(--gold), var(--rose));
        border: none;
      }

      .btn-success:hover {
        transform: translateY(-3px);
      }

      /* ================= ALERT ================= */
      .alert {
        border-radius: 16px;
      }

      /* ================= CONTAINER WIDTH ================= */
      .container {
        max-width: 900px;
      }

      /* ================= SMALL LUXURY TOUCH ================= */
      .card-body {
        padding: 32px;
      }

        /* ===== Wedding Button Effect ===== */
      .btn-wedding {
        font-size: 16px;
        transition: .3s;
      }

      .btn-wedding:hover {
        transform: translateY(-3px) scale(1.02);
        letter-spacing: .5px;
      }
    </style>
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">

  <!-- 🔔 PESAN ERROR / SUCCESS -->
  <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger text-center">
      <?= $_SESSION['error']; ?>
    </div>
  <?php unset($_SESSION['error']); endif; ?>

  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success text-center">
      <?= $_SESSION['success']; ?>
    </div>
  <?php unset($_SESSION['success']); endif; ?>

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

            <!-- NAMA -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Nama Lengkap</label>
              <input type="text" class="form-control" value="<?= htmlspecialchars($nama_user); ?>" readonly>
            </div>

            <!-- PAKET -->
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
                <label class="form-label">Kapasitas Venue</label>
                <input type="text" id="venue-capacity" class="form-control" readonly>
              </div>
            </div>

            <!-- ALAMAT & JUMLAH TAMU MANUAL -->
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

            <!-- JUMLAH TAMU OTOMATIS -->
            <input type="hidden" name="jumlah_tamu_auto" id="jumlah_tamu_auto">

            <!-- TANGGAL -->
            <div class="mb-3">
              <label class="form-label">Tanggal Pernikahan</label>
              <input type="date" name="tanggal_acara" class="form-control" required>
            </div>

            <!-- CATATAN -->
            <div class="mb-3">
              <label class="form-label">Catatan Tambahan</label>
              <textarea name="catatan" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-wedding">
              💌 Kirim Booking
            </button>
          </form>

          <a href="Status_Booking.php" class="btn btn-success w-100 mt-3 btn-wedding">
            💍 Lihat Status Booking
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

  // RESET
  venueInfo.classList.add('d-none');
  alamatAcara.classList.remove('d-none');
  venueName.innerHTML = "";
  venueName.disabled = false;
  venueCapacity.value = "";
  jumlahAuto.value = "";

  // ===== PAKET 500 (AUTO VENUE) =====
  if (paket === "Paket500") {

    venueInfo.classList.remove('d-none');

    const v = venueData[paket][0];

    const opt = document.createElement("option");
    opt.value = v.name;
    opt.textContent = v.name;
    opt.dataset.capacity = v.capacity;
    venueName.appendChild(opt);

    venueName.disabled = true; // tidak bisa diganti
    venueCapacity.value = v.capacity + " orang";

    alamatAcara.classList.add('d-none');
    jumlahAuto.value = v.capacity;

  }

  // ===== PAKET DENGAN PILIHAN VENUE =====
  else if (venueData[paket]) {

    venueInfo.classList.remove('d-none');

    // option default
    const defaultOpt = document.createElement("option");
    defaultOpt.value = "";
    defaultOpt.textContent = "-- Pilih Venue --";
    venueName.appendChild(defaultOpt);

    venueData[paket].forEach(v => {
      const opt = document.createElement("option");
      opt.value = v.name;
      opt.textContent = v.name;
      opt.dataset.capacity = v.capacity;
      venueName.appendChild(opt);
    });

    alamatAcara.classList.add('d-none');
  }

  // ===== PAKET TANPA VENUE =====
  else {
    venueInfo.classList.add('d-none');
    alamatAcara.classList.remove('d-none');
  }
});

// CHANGE VENUE
venueName.addEventListener('change', function () {
  if (this.value === "") {
    venueCapacity.value = "";
    jumlahAuto.value = "";
    return;
  }

  const cap = this.options[this.selectedIndex].dataset.capacity;
  venueCapacity.value = cap + " orang";
  jumlahAuto.value = cap;
});
</script>

</body>
</html>
