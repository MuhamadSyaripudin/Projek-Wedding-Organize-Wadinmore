<?php
session_start();
include 'config/database.php';

if (!isset($_SESSION['login_admin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_admin.php");
    exit;
}

$result = mysqli_query($conn, "
    SELECT * FROM bookings
    WHERE status = 'Completed'
    ORDER BY created_at DESC
");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>History Transaksi - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
    :root{
      --rose:#ec7a98;
      --rose-dark:#d95c7e;
      --gold:#f7c94b;
      --text:#444;
    }

    /* ================= BODY ================= */
    body{
      font-family:'Poppins',sans-serif;
      color:var(--text);

      background:
        radial-gradient(circle at top left,#efd6dc,transparent 45%),
        radial-gradient(circle at bottom right,#e9dbc2,transparent 45%),
        linear-gradient(135deg,#ece7e9,#e3dee1);
    }

    /* ================= TITLE (sama seperti status booking) ================= */
    h3{
      font-family:'Playfair Display',serif;
      font-weight:700;
      color:var(--rose-dark);
      letter-spacing:.5px;
      text-shadow:0 4px 12px rgba(0,0,0,.08);
    }

    /* teks kecil */
    p, td, th, span, a{
      font-weight:400;
      color:var(--text);
    }

    /* ================= CARD ================= */
    .card{
      border:none;
      border-radius:26px;
      background:#fff;
      box-shadow:
        0 25px 60px rgba(0,0,0,.08),
        0 8px 20px rgba(236,122,152,.12);
    }

    /* ================= TABLE ================= */
    .table{
      border-collapse:separate;
      border-spacing:0 12px;
      font-size:14px;
    }

    /* header rose */
    .table thead th{
      font-weight:500;
      background:linear-gradient(135deg,#d88a9b,#c46b7d);
      color:#fff;
      border:none;
      padding:15px;
    }

    /* row */
    .table tbody tr{
      background:#fff7f9;
      border-radius:18px;
      box-shadow:0 6px 14px rgba(0,0,0,.05);
      transition:.25s;
    }

    .table tbody tr:hover{
      transform:translateY(-3px);
      background:#fff3f7;
    }

    .table td{
      border:none;
      padding:14px;
    }

    /* ================= BADGE ================= */
    .badge{
      border-radius:25px;
      padding:7px 14px;
      font-weight:500;
    }

    .bg-primary{
      background:#ece2ff !important;
      color:#5c39b0 !important;
    }

    /* ================= BUTTON ================= */
    .btn-secondary{
      background:#f3d9df;
      color:#333 !important;   /* teks hitam lembut */
      border:none;
      font-weight:400;         /* tidak bold */
      border-radius:30px;
      padding:8px 20px;
      box-shadow:0 6px 18px rgba(0,0,0,.08);
    }

    .btn-secondary:hover{
      background:#e7bcc6;
      color:#333 !important;
      transform:translateY(-2px);
    }
    </style>

</head>
<body>

<div class="container mt-5">
  <div class="d-flex justify-content-between mb-3">
    <h3>History Transaksi</h3>
    <a href="Dashboard_admin.php" class="btn btn-secondary">Kembali</a>
  </div>

  <div class="card shadow">
    <div class="card-body">
      <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th>Nama User</th>
            <th>Paket</th>
            <th>Tanggal Acara</th>
            <th>Alamat</th>
            <th>Jumlah Tamu</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($b = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $b['nama_user']; ?></td>
                <td><?= $b['nama_paket']; ?></td>
                <td><?= date('d-m-Y', strtotime($b['tanggal_acara'])); ?></td>
                <td><?= $b['alamat_acara'] ?: '-'; ?></td>
                <td><?= $b['jumlah_tamu'] ?: '-'; ?></td>
                <td>
                    <span class="badge bg-primary">Completed</span>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-muted">Belum ada history transaksi</td>
            </tr>
        <?php endif; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
