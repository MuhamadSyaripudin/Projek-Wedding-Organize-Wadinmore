<?php
session_start();
include 'config/database.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("ID booking tidak ditemukan.");
}

$id_booking = mysqli_real_escape_string($conn, $_GET['id']);
$id_user    = $_SESSION['user_id'];

// QUERY FINAL (AMAN & VALID)
$q = mysqli_query($conn, "
    SELECT b.*, u.nama_lengkap
    FROM bookings b
    JOIN users u ON b.id_user = u.id_user
    WHERE b.id_booking = '$id_booking'
    AND b.id_user = '$id_user'
    AND b.status = 'Confirmed'
");

if (!$q) {
    die("Query error: " . mysqli_error($conn));
}

if (mysqli_num_rows($q) === 0) {
    die("Booking tidak valid atau belum dikonfirmasi.");
}

$data = mysqli_fetch_assoc($q);

$nama_user     = $data['nama_lengkap'];
$paket         = $data['nama_paket'];
$tanggal_acara = date('d-m-Y', strtotime($data['tanggal_acara']));
$dp_min        = 1000000;
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
    .card { max-width: 650px; margin: auto; }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
  <h2 class="text-center mb-4">Konfirmasi Pembayaran</h2>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="alert alert-info mb-4">
        <h5 class="mb-2">Informasi Rekening Pembayaran</h5>
        <p class="mb-1"><strong>Bank:</strong> BNI</p>
        <p class="mb-1"><strong>No. Rekening:</strong> 1616921006</p>
        <p class="mb-0"><strong>Atas Nama:</strong> Muhamad Syaripudin</p>
      </div>


      <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Nama:</strong> <?= htmlspecialchars($nama_user) ?></li>
        <li class="list-group-item"><strong>Paket:</strong> <?= htmlspecialchars($paket) ?></li>
        <li class="list-group-item"><strong>Tanggal Acara:</strong> <?= $tanggal_acara ?></li>
        <li class="list-group-item"><strong>DP Minimal:</strong> Rp <?= number_format($dp_min,0,",",".") ?></li>
      </ul>

      <form action="proses_pembayaran.php" method="post">
        <input type="hidden" name="id_booking" value="<?= $id_booking ?>">

        <div class="mb-3">
          <label class="form-label">Nama Pengirim</label>
          <input type="text" class="form-control" value="<?= htmlspecialchars($nama_user) ?>" readonly>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Transfer</label>
          <input type="date" name="tanggal_transfer" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Jumlah DP</label>
          <input type="number" name="jumlah_dp" class="form-control" value="<?= $dp_min ?>" min="1000000" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">
            Konfirmasi & Kirim ke WhatsApp
          </button>
        </div>
      </form>

      <p class="text-muted mt-3 text-center">
        *Bukti transfer dikirim manual melalui WhatsApp setelah halaman ini.*
      </p>

    </div>
  </div>
</div>

</body>
</html>
