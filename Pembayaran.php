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
    /* ================= COLOR SYSTEM (SAMA SEPERTI BOOKING) ================= */
      :root{
        --rose:#b76e79;
        --rose-soft:#f6e6ea;
        --gold:#d4af37;
        --gold-soft:#fff3d6;
        --cream:#fffaf7;
        --text:#4a4a4a;
      }

      /* ================= BODY ================= */
      body{
        padding-top:70px;
        font-family:'Poppins',sans-serif;

        background:
          radial-gradient(circle at top left,#ffeef2,transparent 50%),
          radial-gradient(circle at bottom right,#fff6e3,transparent 55%),
          linear-gradient(135deg,var(--cream),#fff);
      }

      /* ================= TITLE ================= */
      h2{
        font-family:'Playfair Display',serif;
        color:var(--rose);
        font-weight:700;
        letter-spacing:1px;
        text-shadow:0 6px 18px rgba(183,110,121,.25);
      }

      /* ================= CARD PREMIUM ================= */
      .card{
        max-width:650px;
        margin:auto;

        border:none;
        border-radius:30px;
        padding:26px;

        background:#fff;

        box-shadow:
          0 30px 70px rgba(183,110,121,.20),
          inset 0 0 0 1px rgba(255,255,255,.8);
      }

      /* ================= ALERT REKENING ================= */
      .alert-info{
        background:var(--gold-soft);
        border:none;
        border-radius:18px;
        color:#7a5a00;
      }

      /* ================= LIST INFO BOOKING ================= */
      .list-group-item{
        border:none;
        background:var(--rose-soft);
        margin-bottom:10px;
        border-radius:14px;
        font-weight:500;
        color:var(--text);
      }

      /* ================= INPUT ================= */
      .form-control{
        border-radius:14px;
        border:1px solid #eee;
        padding:10px 14px;
      }

      .form-control:focus{
        border-color:var(--rose);
        box-shadow:0 0 0 0.15rem rgba(183,110,121,.25);
      }

      /* ================= BUTTON PREMIUM ================= */
      .btn-primary{
        border:none;
        border-radius:30px;
        padding:12px;
        font-weight:600;

        background:linear-gradient(135deg,var(--rose),var(--gold));
        box-shadow:0 10px 25px rgba(183,110,121,.35);
      }

      .btn-primary:hover{
        transform:translateY(-3px);
        box-shadow:0 18px 40px rgba(183,110,121,.45);
      }

      /* ================= NOTE TEXT ================= */
      .text-muted{
        font-size:13px;
      }

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
