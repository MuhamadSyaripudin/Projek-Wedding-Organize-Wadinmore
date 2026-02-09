<?php
session_start();
include 'config/database.php';

// Proteksi admin
if (!isset($_SESSION['login_admin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_admin.php");
    exit;
}

// ❗ booking COMPLETED tidak ditampilkan
$result = mysqli_query($conn, "
    SELECT * FROM bookings 
    WHERE status != 'Completed'
    ORDER BY created_at DESC
");

$bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

  <style>
    :root{
      --rose:#ec7a98;
      --rose-dark:#d95c7e;
      --gold:#f7c94b;
      --gold-strong:#e6a900;
      --text:#444;
    }

    /* ================= BODY ================= */
    body{
      padding-top:70px;
      font-family:'Poppins',sans-serif;

      background:
      radial-gradient(circle at top left,#f8dfe6,transparent 45%),
      radial-gradient(circle at bottom right,#f3e4c4,transparent 45%),
      linear-gradient(135deg,#f5f2f3,#efe8ea);
    }

    /* ================= TITLE ================= */
    h2{
      font-family:'Playfair Display',serif;
      font-weight:700;
      color:var(--rose-dark);
    }

    /* ================= CARD ================= */
    .card{
      border:none;
      border-radius:30px;
      background:#fff;
      box-shadow:
        0 30px 70px rgba(0,0,0,.08),
        0 10px 25px rgba(236,122,152,.15);
    }

    /* ================= TABLE ================= */
    .table{
      border-collapse:separate;
      border-spacing:0 14px;
    }

    /* HEADER ROSE LUXURY */
    .table thead th{
      background:linear-gradient(135deg,#d88a9b,#c46b7d);
      color:#fff;
      border:none;
      padding:16px;
      font-weight:600;
    }

    /* ROW STYLE */
    .table tbody tr{
      background:#fff7f9;
      border-radius:20px;
      box-shadow:0 8px 18px rgba(0,0,0,.06);
      transition:.25s;
    }

    .table tbody tr:hover{
      transform:translateY(-4px);
      background:#fff5f8;
      box-shadow:0 16px 35px rgba(236,122,152,.25);
    }

    .table td{
      border:none;
      padding:15px;
      color:var(--text);
      font-weight:500;
    }

    /* ================= BADGE ================= */
    .badge{
      border-radius:30px;
      padding:7px 14px;
      font-weight:600;
      font-size:13px;
    }

    .bg-warning{
      background:#fff3c7 !important;
      color:#a87400 !important;
    }

    .bg-success{
      background:#d6ffe7 !important;
      color:#0d8f56 !important;
    }

    .bg-danger{
      background:#ffdcdc !important;
      color:#c23030 !important;
    }

    /* ================= BUTTON ================= */
    .btn{
      border-radius:30px;
      font-weight:600;
      border:none;
    }

    /* tombol utama */
    .btn-primary{
      background:linear-gradient(135deg,var(--rose),var(--gold));
      color:#fff;
      box-shadow:0 10px 25px rgba(236,122,152,.35);
    }

    .btn-primary:hover{
      transform:translateY(-3px);
      box-shadow:0 20px 45px rgba(236,122,152,.45);
    }

    /* history transaksi */
    .btn-outline-primary{
      border-radius:30px;
    }

    /* select */
    .form-select{
      border-radius:20px;
    }

    /* fade halus */
    .container{
      animation:fadeIn .6s ease;
    }
    @keyframes fadeIn{
      from{opacity:0;transform:translateY(20px);}
      to{opacity:1;transform:translateY(0);}
    }

    /* ================= HALO ADMIN ================= */
    .admin-greet{
      color:var(--rose-dark);
      font-weight:500;
      letter-spacing:.3px;
    }

    .admin-greet strong{
      color:var(--rose);
      font-weight:600;
    }

    /* ================= HISTORY BUTTON ================= */
    .btn-history{
      background:linear-gradient(135deg,#ff9db3,#ffc86b);
      color:#fff;
      border-radius:35px;
      padding:10px 22px;
      font-weight:600;
      box-shadow:0 10px 25px rgba(236,122,152,.30);
      transition:.25s;
    } 

    .btn-history:hover{
      background:linear-gradient(135deg,var(--rose-dark),var(--gold-strong));
      transform:translateY(-3px);
      box-shadow:0 18px 40px rgba(236,122,152,.45);
    }    
  </style>

</head>
<body>

<div class="container mt-5 pb-5">
  <h2 class="text-center mb-4">Dashboard Admin</h2>
  <!-- HEADER -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="admin-greet">
      👋 Halo <strong><?= $_SESSION['nama_admin']; ?></strong>
    </h5>

    <a href="history_transaksi.php" class="btn btn-history">
      📋 History Transaksi
    </a>
  </div>

 <div class="card shadow-sm p-2">
    <div class="card-body">
      <table class="table table-striped text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th>Nama User</th>
            <th>Paket</th>
            <th>Tanggal</th>
            <th>Alamat / Venue</th>
            <th>Jumlah Tamu</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

        <?php if (count($bookings) > 0): ?>
          <?php foreach ($bookings as $b): ?>
          <tr>
            <td><?= htmlspecialchars($b['nama_user']); ?></td>
            <td><?= htmlspecialchars($b['nama_paket']); ?></td>
            <td><?= date('d-m-Y', strtotime($b['tanggal_acara'])); ?></td>

            <!-- Alamat / Venue -->
            <td>
              <?php
                if (!empty($b['venue'])) {
                    echo htmlspecialchars($b['venue']);
                } elseif (!empty($b['alamat_acara'])) {
                    echo htmlspecialchars($b['alamat_acara']);
                } else {
                    echo '-';
                }
              ?>
            </td>

            <td><?= $b['jumlah_tamu'] ?: '-'; ?></td>

            <!-- STATUS -->
            <td>
              <?php if ($b['status'] === 'Pending'): ?>
                <span class="badge bg-warning text-dark">Pending</span>
              <?php elseif ($b['status'] === 'Confirmed'): ?>
                <span class="badge bg-success">Confirmed</span>
              <?php elseif ($b['status'] === 'Cancelled'): ?>
                <span class="badge bg-danger">Cancelled</span>
              <?php endif; ?>
            </td>

            <!-- AKSI -->
            <td>
              <form action="update_status.php" method="post" class="d-flex gap-1">
                <input type="hidden" name="id_booking" value="<?= $b['id_booking'] ?>">
                <select name="status" class="form-select form-select-sm" required>
                  <option value="">Ubah</option>
                  <option value="Pending">Pending</option>
                  <option value="Confirmed">Confirmed</option>
                  <option value="Completed">Completed</option>
                  <option value="Cancelled">Cancelled</option>
                </select>

                <button class="btn btn-sm btn-primary">✔</button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-muted">Belum ada data booking</td>
          </tr>
        <?php endif; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
</body>

<?php if(isset($_GET['success'])): ?>
<script>
  alert("Status berhasil diubah!");
</script>
<?php endif; ?>

</html>
